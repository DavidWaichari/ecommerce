<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Processor;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $stocks = Stock::orderBy('updated_at', 'desc')->get();
        return view('admin/stocks/index', compact('stocks'));
    }

    // Show the form for creating a new stock item.
    public function create()
    {
        $products = Product::all(); // Retrieve all products
        $suppliers = Supplier::all(); // Retrieve all products
        return view('admin.stocks.create', compact('products', 'suppliers'));
    }


    // Show the specified resource.
    public function show(Stock $stock)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $stockItems  = $stock->items;
        return view('admin/stocks/show', compact('stock', 'products', 'suppliers','stockItems'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'unit_bp' => 'required|numeric',
            'unit_sp' => 'required|numeric',
            'no_of_items' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'receipt' => 'nullable|file|mimes:pdf,jpeg,png|max:2048',
        ]);

        // Check if 'stock_id' is provided
        $stock = null;
        $product = Product::find($request->product_id);
        if ($request->has('stock_id')) {
            // If stock_id exists, retrieve the stock
            $stock = Stock::find($request->input('stock_id'));
        } else {
            // If no stock_id, create a new Stock record
            $stockData = [
                'total_amount' => 0, // Initialize, will update later
                'status' => $request->input('status', 'Pending'), // Default status
                'updated_by' => auth()->id(),
                'supplier_id' => $request->input('supplier_id'),
            ];

            // Handle receipt file upload if present
            if ($request->hasFile('receipt')) {
                $receipt = $request->file('receipt');

                // Fetch product name from the product model
                $stockName = $product ? $product->name : 'unknown_product'; // Fallback if product is not found

                $receiptName = $this->generateFileName($stockName, $receipt->getClientOriginalExtension(), 'receipt');
                $receipt->move(public_path('uploads/receipts'), $receiptName);
                $stockData['receipt'] = $receiptName;
            }

            // Create the Stock
            $stock = Stock::create($stockData);
        }

        // Calculate total amount for the StockItem
        $unitBp = $request->input('unit_bp'); // Buying price per item
        $noOfItems = $request->input('no_of_items');
        $totalAmount = $unitBp * $noOfItems;

        // Create a StockItem
        $stockItem = StockItem::create([
            'unit_bp' => $unitBp,
            'unit_sp' => $request->input('unit_sp'),
            'no_of_items' => $noOfItems,
            'total_amount' => $totalAmount,
            'status' => $request->input('status', 'Available'),
            'extras' => $request->input('extras'),
            'stock_id' => $stock->id,
            'product_id' => $request->input('product_id'),
            'updated_by' => auth()->id(),
        ]);

        // Update total amount in the stock
        $stock->total_amount += $totalAmount;
        $stock->save();

        // Update the no of items for the product
        $product->in_stock += $noOfItems;
        $product->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Stock and StockItem created successfully.');
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        if ($stock) {
            $stock->update($request->all());

              // Handle receipt file upload if present
              if ($request->hasFile('receipt')) {
                $receiptPath = public_path('uploads/receipts/' . $stock->receipt);
                if (file_exists($receiptPath)) {
                    unlink($receiptPath);
                }

                $receipt = $request->file('receipt');

                // Fetch product name from the product model
                $stockName = 'Stockname';

                $receiptName = $this->generateFileName($stockName, $receipt->getClientOriginalExtension(), 'receipt');
                $receipt->move(public_path('uploads/receipts'), $receiptName);
                $stock->receipt = $receiptName;
                $stock->save();
            }

        } 
        return redirect()->route('admin.stocks.index')->with('success', 'Stock Updated Successfully');  
    }

    // Remove the specified resource from storage.
    public function destroy(Stock $stock)
    {
        // Delete receipt file if it exists
        if ($stock->receipt) {
            $receiptPath = public_path('uploads/receipts/' . $stock->receipt);
            if (file_exists($receiptPath)) {
                unlink($receiptPath);
            }
        }
          // Update the no of items for the product
          foreach ($stock->items as $item) {
            $product = $item->product;
            $product->in_stock -= $item->no_of_items;
            $product->save(); 
          }
        // Delete the stock record
        $stock->delete();

        // Redirect with success message
        return redirect()->route('admin.stocks.index')->with('success', 'Stock deleted successfully.');
    }

    // Generate a unique file name based on stock name and type
    private function generateFileName(string $stockName, string $extension, string $type)
    {
        return Str::slug($stockName) . '_' . $type . '_' . time() . '.' . $extension;
    }

    public function downloadReceipt($id)
    {
        $stock = Stock::findOrFail($id);

        if ($stock->receipt) {
            $filePath = public_path('uploads/receipts/' . $stock->receipt);

            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'Receipt not found.');
    }

    public function deleteStockItem($id)
    {
        $stock = Stock::findOrFail($id);

        //Update the product
        $product = $stock->product;
        $product->in_stock -= $stock->no_of_items;
        $product->save(); 

        $stock->delete();

        return redirect()->back()->with('success', 'Stock item deleted successfully.');
    }


}
