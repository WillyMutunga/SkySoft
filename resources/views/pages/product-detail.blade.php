@extends('layouts.app')

@section('title', $product->name . ' | SkySoft Systems Kenya')
@section('meta_description', $product->short_description)

@push('styles')
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{ $product->name }}",
  "image": [
    "{{ $product->image_url ?? 'https://skysoftsystems.co.ke/assets/images/logo.jpg' }}"
  ],
  "description": "{{ $product->short_description }}",
  "sku": "SKY-{{ $product->id }}",
  "brand": {
    "@type": "Brand",
    "name": "SkySoft Systems"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "KES",
    "price": "{{ $product->price ?? 0 }}",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  }
}
</script>
<style>
@media print {
    header, footer, .no-print, .modal-backdrop { display: none !important; }
    body { background: white !important; color: black !important; }
    .print-full { width: 100% !important; margin: 0 !important; }
}
</style>
@endpush

@section('content')
<!-- Breadcrumbs -->
<div class="bg-white border-b border-slate-200 py-3 text-xs text-slate-500 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-emerald-600">Home</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-emerald-600">Products</a>
        <span>/</span>
        <a href="{{ route('products.index', ['category' => $product->category]) }}" class="hover:text-emerald-600">{{ $product->category }}</a>
        <span>/</span>
        <span class="text-slate-900 font-medium truncate">{{ $product->name }}</span>
    </div>
</div>

<!-- Product Main Detail Section -->
<section class="py-12 bg-white" x-data="{ quoteModalOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Product Media Showcase -->
            <div class="lg:col-span-6 space-y-4">
                <div class="relative bg-slate-100 rounded-3xl overflow-hidden border border-slate-200 shadow-sm aspect-w-4 aspect-h-3">
                    <img src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-96 object-cover">
                    @if($product->badge)
                    <span class="absolute top-4 left-4 bg-emerald-600 text-white text-xs uppercase tracking-wider font-extrabold px-3 py-1 rounded-lg shadow-md">
                        {{ $product->badge }}
                    </span>
                    @endif
                </div>

                <!-- Trust Points Under Image -->
                <div class="grid grid-cols-3 gap-3 text-center text-xs">
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <span class="font-bold text-slate-900 block">&check; 1-2 Yr Warranty</span>
                        <span class="text-[10px] text-slate-500">Official Partner Support</span>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <span class="font-bold text-slate-900 block">&check; Free Site Survey</span>
                        <span class="text-[10px] text-slate-500">Within Nairobi County</span>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                        <span class="font-bold text-slate-900 block">&check; M-Pesa & KRA</span>
                        <span class="text-[10px] text-slate-500">Full Local Integration</span>
                    </div>
                </div>
            </div>

            <!-- Right: Product Information & Purchase/Quote Actions -->
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-xs uppercase font-bold tracking-wider text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">
                        {{ $product->category }}
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-3">
                        {{ $product->name }}
                    </h1>
                </div>

                <!-- Price Tag -->
                <div class="flex items-baseline space-x-3 pb-4 border-b border-slate-200">
                    <span class="text-3xl font-extrabold text-emerald-600">{{ $product->formatted_price }}</span>
                    @if($product->price_type !== 'custom_quote')
                    <span class="text-xs text-slate-500">VAT Included &bull; Installation Support Available</span>
                    @endif
                </div>

                <!-- Short Description -->
                <p class="text-slate-600 text-sm leading-relaxed">
                    {{ $product->short_description }}
                </p>

                <!-- Primary Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2 no-print">
                    <button @click="quoteModalOpen = true" class="w-full sm:w-auto flex-1 py-3.5 px-6 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Request Official Quote</span>
                    </button>
                    
                    @php
                        $waText = "Hello SkySoft Systems, I would like to inquire about: " . $product->name . " (SKU: SKY-" . $product->id . ", " . $product->formatted_price . "). Please share delivery details.";
                    @endphp
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $companySettings['company_whatsapp'] ?? '254712345678') }}?text={{ urlencode($waText) }}" target="_blank" class="w-full sm:w-auto py-3.5 px-6 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white font-bold text-sm shadow-md transition flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp Quote</span>
                    </a>

                    <a href="{{ route('products.datasheet', $product->slug) }}" target="_blank" class="px-4 py-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold text-xs transition flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Official Datasheet (PDF)</span>
                    </a>
                </div>

                <!-- Key Highlights List -->
                @if(!empty($product->features) && count($product->features) > 0)
                <div class="pt-6 border-t border-slate-200 space-y-3">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Key Product Features</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600">
                        @foreach($product->features as $feature)
                        <div class="flex items-start">
                            <span class="text-emerald-500 mr-2 font-bold flex-shrink-0">&check;</span>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

        </div>

        <!-- Full Description & Technical Specs Tabs -->
        <div class="mt-16 pt-12 border-t border-slate-200">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Detailed Overview -->
                <div class="lg:col-span-7 space-y-6">
                    <h2 class="text-2xl font-bold text-slate-900">Detailed Product Overview</h2>
                    <div class="prose prose-emerald text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Technical Specifications Table -->
                <div class="lg:col-span-5 space-y-6">
                    <h2 class="text-2xl font-bold text-slate-900">Technical Specifications</h2>
                    @if(!empty($product->specs) && count($product->specs) > 0)
                    <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden text-xs">
                        <table class="w-full text-left border-collapse">
                            <tbody>
                                @foreach($product->specs as $label => $val)
                                <tr class="border-b border-slate-200 last:border-b-0">
                                    <td class="py-3 px-4 font-bold text-slate-700 bg-slate-100/60 w-1/3">{{ $label }}</td>
                                    <td class="py-3 px-4 text-slate-600">{{ $val }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-xs text-slate-500">Contact our sales team for detailed engineering datasheets.</p>
                    @endif
                </div>

            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
        <div class="mt-20 pt-12 border-t border-slate-200 no-print">
            <h2 class="text-2xl font-bold text-slate-900 mb-8">Related Products in {{ $product->category }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProducts as $rel)
                <div class="bg-slate-50 rounded-2xl border border-slate-200 p-5 space-y-3 hover:shadow-md transition">
                    <h4 class="font-bold text-slate-900 text-sm line-clamp-1"><a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a></h4>
                    <p class="text-xs text-slate-500 line-clamp-2">{{ $rel->short_description }}</p>
                    <div class="flex justify-between items-center pt-2">
                        <span class="font-extrabold text-emerald-600 text-sm">{{ $rel->formatted_price }}</span>
                        <a href="{{ route('products.show', $rel->slug) }}" class="text-xs font-semibold text-slate-700 hover:text-emerald-600">View &rarr;</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    <!-- Request Quote Modal Dialog -->
    <div x-show="quoteModalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            
            <div x-show="quoteModalOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 transition-opacity bg-slate-900 bg-opacity-75" 
                 @click="quoteModalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="quoteModalOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-3xl sm:p-8">
                
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Request Official Quote</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Item: {{ $product->name }}</p>
                    </div>
                    <button @click="quoteModalOpen = false" class="text-slate-400 hover:text-slate-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form action="{{ route('products.quote', $product->id) }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Your Full Name *</label>
                        <input type="text" name="name" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email Address *</label>
                            <input type="email" name="email" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone Number (WhatsApp) *</label>
                            <input type="text" name="phone" required placeholder="+254 7..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Company / Organization</label>
                            <input type="text" name="company" placeholder="e.g. Apex Supermarket" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Estimated Quantity</label>
                            <input type="text" name="quantity" placeholder="e.g. 2 Units" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Special Requirements / Notes</label>
                        <textarea name="message" rows="3" placeholder="Tell us about your installation location, timeline or any specific feature requirements..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500"></textarea>
                    </div>

                    <div class="pt-4 flex justify-end space-x-3">
                        <button type="button" @click="quoteModalOpen = false" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-semibold hover:bg-slate-50">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition">Submit Quote Request</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
