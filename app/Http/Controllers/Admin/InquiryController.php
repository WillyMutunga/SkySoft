<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::with('product');

        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->latest()->paginate(15);

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show($id)
    {
        $inquiry = Inquiry::with('product')->findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $inquiry->update($validated);

        return redirect()->back()->with('success', 'Inquiry status updated successfully.');
    }

    public function exportCsv()
    {
        $inquiries = Inquiry::with('product')->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="skysoft_inquiries_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($inquiries) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Date', 'Name', 'Email', 'Phone', 'Company', 'Product', 'Subject', 'Status', 'Message', 'Admin Notes']);

            foreach ($inquiries as $row) {
                fputcsv($handle, [
                    $row->id,
                    $row->created_at->format('Y-m-d H:i:s'),
                    $row->name,
                    $row->email,
                    $row->phone ?? '',
                    $row->company ?? '',
                    $row->product ? $row->product->name : '',
                    $row->subject ?? '',
                    $row->status,
                    $row->message,
                    $row->admin_notes ?? '',
                ]);
            }

            fclose($handle);
        };

        return new StreamedResponse($callback, 200, $headers);
    }

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
