<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Official Datasheet & Specification Sheet | SkySoft Systems</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/color/96/server.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            body { background: #ffffff !important; color: #000000 !important; font-size: 11pt; }
            .no-print { display: none !important; }
            .print-border { border: 1px solid #cbd5e1 !important; }
            .page-break { page-break-after: always; }
            @page { margin: 12mm 15mm; size: A4 portrait; }
        }
    </style>
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased p-4 sm:p-8">

    <!-- Top Action Bar (Screen only) -->
    <div class="max-w-4xl mx-auto mb-6 flex flex-col sm:flex-row items-center justify-between gap-4 no-print bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center space-x-3">
            <a href="{{ route('products.show', $product->slug) }}" class="inline-flex items-center text-xs font-semibold text-slate-600 hover:text-emerald-600 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Product Page
            </a>
            <span class="text-slate-300">|</span>
            <span class="text-xs text-slate-500 font-medium">Official Engineering Datasheet</span>
        </div>
        <div class="flex items-center space-x-3">
            <button onclick="window.print()" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                Print / Save as PDF
            </button>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}?text={{ urlencode('Hello SkySoft Systems, I would like to order: ' . $product->name) }}" target="_blank" class="inline-flex items-center px-4 py-2.5 rounded-xl bg-[#25D366] text-white text-xs font-bold shadow-sm transition">
                WhatsApp Order
            </a>
        </div>
    </div>

    <!-- Official Printable Datasheet Container -->
    <div class="max-w-4xl mx-auto bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-xl print:shadow-none print:border-none print:p-0">
        
        <!-- Header: Corporate Identity -->
        <div class="flex flex-row items-center justify-between border-b-2 border-emerald-600 pb-6 mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">SkySoft<span class="text-emerald-600">Systems</span></h1>
                    <p class="text-[10px] uppercase font-bold tracking-widest text-slate-500">Enterprise IT & Power Engineering Kenya</p>
                </div>
            </div>

            <div class="text-right text-xs text-slate-600 space-y-0.5">
                <p class="font-bold text-slate-900">{{ $companySettings['office_address'] ?? 'Nairobi, Kenya' }}</p>
                <p>Phone: <span class="font-semibold text-slate-800">{{ $companySettings['company_phone'] ?? '+254 712 345 678' }}</span></p>
                <p>Email: <span class="text-emerald-700">{{ $companySettings['company_email'] ?? 'info@skysoftsystems.co.ke' }}</span></p>
                <p class="text-[10px] text-slate-400">Web: https://skysoftsystems.co.ke</p>
            </div>
        </div>

        <!-- Product Hero Block -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start mb-8 pb-8 border-b border-slate-200">
            
            <!-- Product Photo -->
            <div class="md:col-span-4 bg-slate-50 p-4 rounded-2xl border border-slate-100 flex items-center justify-center">
                <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $product->name }}" class="w-full max-h-56 object-contain rounded-xl">
            </div>

            <!-- Product Summary Info -->
            <div class="md:col-span-8 space-y-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs uppercase font-extrabold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-200">
                        {{ $product->category }}
                    </span>
                    @if($product->badge)
                    <span class="text-xs uppercase font-extrabold text-white bg-slate-900 px-3 py-1 rounded-md">
                        {{ $product->badge }}
                    </span>
                    @endif
                    <span class="text-xs font-mono text-slate-500 ml-auto">DOC-REF: SS-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>

                <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ $product->name }}</h2>
                <p class="text-sm text-slate-600 leading-relaxed">{{ $product->short_description }}</p>

                <!-- Pricing & Compliance Box -->
                <div class="bg-emerald-50/60 p-4 rounded-xl border border-emerald-200/80 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block">Commercial Pricing</span>
                        <span class="text-2xl font-black text-slate-900">{{ $product->formatted_price }}</span>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-2.5 py-1 rounded text-[11px] font-bold bg-emerald-600 text-white">
                            &check; KRA eTIMS & M-Pesa Ready
                        </span>
                        <p class="text-[10px] text-slate-500 mt-1">Official VAT / ETR Receipt Provided</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Technical Description -->
        <div class="mb-8 pb-8 border-b border-slate-200 space-y-3">
            <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider text-emerald-700">1. Product Overview & Architecture</h3>
            <p class="text-xs text-slate-700 leading-relaxed">{{ $product->description }}</p>
        </div>

        <!-- Key Engineering Features & Technical Specifications -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 pb-8 border-b border-slate-200">
            
            <!-- Features Checklist -->
            <div>
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider text-emerald-700 mb-3">2. Core System Features</h3>
                @if(!empty($product->features) && count($product->features) > 0)
                <ul class="space-y-2 text-xs text-slate-700">
                    @foreach($product->features as $feat)
                    <li class="flex items-start">
                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-[10px] mr-2 mt-0.5 flex-shrink-0">&check;</span>
                        <span>{{ $feat }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-xs text-slate-500">Enterprise build with industry standard components.</p>
                @endif
            </div>

            <!-- Technical Specifications Table -->
            <div>
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider text-emerald-700 mb-3">3. Technical Specifications</h3>
                @if(!empty($product->specifications) && count($product->specifications) > 0)
                <div class="border border-slate-200 rounded-xl overflow-hidden">
                    <table class="w-full text-xs text-left">
                        <tbody class="divide-y divide-slate-200">
                            @foreach($product->specifications as $key => $val)
                            <tr class="even:bg-slate-50">
                                <td class="py-2 px-3 font-bold text-slate-700 bg-slate-100/50 w-2/5">{{ $key }}</td>
                                <td class="py-2 px-3 text-slate-800">{{ $val }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-xs text-slate-500">Full specification sheet available on custom deployment.</p>
                @endif
            </div>
        </div>

        <!-- Warranty, Support & Tender Endorsement -->
        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-6 text-xs text-slate-600 mb-8">
            <div class="space-y-1">
                <h4 class="font-bold text-slate-900 flex items-center">
                    <svg class="w-4 h-4 text-emerald-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Warranty & Support
                </h4>
                <p>1 - 3 Year Hardware Warranty with certified repair & replacement service in Nairobi.</p>
            </div>
            <div class="space-y-1">
                <h4 class="font-bold text-slate-900 flex items-center">
                    <svg class="w-4 h-4 text-emerald-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Nationwide Delivery
                </h4>
                <p>Same-day delivery in Nairobi & 24h courier dispatch across all 47 counties in Kenya.</p>
            </div>
            <div class="space-y-1">
                <h4 class="font-bold text-slate-900 flex items-center">
                    <svg class="w-4 h-4 text-emerald-600 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Corporate Procurement
                </h4>
                <p>Official Proforma Invoices, LPOs, and KRA eTIMS compliant billing for tenders.</p>
            </div>
        </div>

        <!-- Footer Verification & Stamp Box -->
        <div class="flex flex-row items-center justify-between pt-4 border-t border-slate-200 text-[10px] text-slate-500">
            <div>
                <p>&copy; {{ date('Y') }} SkySoft Systems. Registered Technology Provider in Kenya.</p>
                <p>Generated on {{ date('d M Y, H:i') }} (EAT) &bull; Ref: {{ $product->slug }}</p>
            </div>
            <div class="text-right">
                <p class="font-bold text-slate-700">Official Engineering Datasheet</p>
                <p class="text-emerald-700 font-semibold">https://skysoftsystems.co.ke</p>
            </div>
        </div>

    </div>

</body>
</html>
