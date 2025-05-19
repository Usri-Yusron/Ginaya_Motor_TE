@extends('layouts.layouts-landing')

@section('title', 'Stylique - Premium Fashion Store')

@section('content')
    <!-- Hero Section with Enhanced Design -->
    <div id="hero-section"
        class="relative min-h-[90vh] overflow-hidden bg-gradient-to-br from-teal-50 via-white to-teal-100">
        <!-- Abstract Background Shapes - Using only Tailwind -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-teal-200 rounded-full opacity-20 blur-xl transform hover:scale-105 transition-transform duration-700">
            </div>
            <div
                class="absolute top-0 -right-24 w-96 h-96 bg-teal-300 rounded-full opacity-20 blur-xl transform hover:scale-105 transition-transform duration-700">
            </div>
            <div
                class="absolute -bottom-24 left-1/2 w-96 h-96 bg-teal-100 rounded-full opacity-20 blur-xl transform hover:scale-105 transition-transform duration-700">
            </div>
        </div>

        <div class="max-w-7xl mx-auto relative">
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 min-h-[90vh] items-center px-4 sm:px-6 lg:px-8">
                <div class="text-center md:text-left space-y-8 sm:space-y-10">
                    <!-- Main Heading with Enhanced Typography -->
                    <h1 class="text-5xl sm:text-6xl md:text-7xl tracking-tight font-extrabold">
                        <span class="block mb-2 text-gray-900">Discover Your</span>
                        <span
                            class="block bg-gradient-to-r from-teal-600 to-teal-400 bg-clip-text text-transparent">
                            Motor's Style
                        </span>
                    </h1>

                    <!-- Subheading -->
                    <p class="mx-auto md:mx-0 max-w-2xl text-lg sm:text-xl text-gray-600 leading-relaxed">
                       Solusi cerdas untuk mengubah pengalaman bermotor anda layaknya seperti Valentino Rossi dengan sparepart terbaru keluaran pabrik.
                    </p>

                    <!-- CTA Buttons with Enhanced Design -->
                    <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#featured-products"
                            class="group relative inline-flex items-center justify-center px-8 py-3 sm:px-10 sm:py-4 text-lg font-medium text-white bg-gradient-to-r from-teal-600 to-teal-500 rounded-xl shadow-xl transition-all duration-300 hover:from-teal-700 hover:to-teal-600 hover:scale-105 hover:shadow-2xl overflow-hidden">
                            <span class="relative z-10">Shop Collection</span>
                            <!-- Using only Tailwind for shine effect -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover:translate-x-[200%] transition-transform duration-1000">
                            </div>
                        </a>
                        <a href="#trending"
                            class="inline-flex items-center justify-center px-8 py-3 sm:px-10 sm:py-4 text-lg font-medium text-teal-600 bg-white border-2 border-teal-400 rounded-xl shadow-md transition-all duration-300 hover:bg-teal-50 hover:shadow-lg">
                            Trending Now
                        </a>
                    </div>
                    
                    <!-- Trust Badges -->
                    <div class="pt-4 flex flex-wrap justify-center md:justify-start gap-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="ml-2 text-sm text-gray-600">4.9/5 Rating</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="ml-2 text-sm text-gray-600">Express Delivery</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span class="ml-2 text-sm text-gray-600">Secure Checkout</span>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Image with Animation -->
                <div class="hidden md:flex justify-center items-center h-[500px] relative">
                    <div class="absolute w-full h-full flex items-center justify-center">
                        <div class="w-72 h-72 bg-teal-100 rounded-full opacity-40 animate-pulse"></div>
                    </div>
                    <div id="hero-lottie" class="w-full h-full relative z-10"></div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" class="w-full h-auto">
                <path fill="#f9fafb" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path>
            </svg>
        </div>
    </div>

    <!-- Trending Categories Section (New) -->
    <div id="trending" class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Trending Categories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Explore our most popular sparepart categories</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden aspect-square">
                        <img src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3" alt="Women's Collection" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4">
                            <h3 class="text-white font-medium text-lg">Suku Cadang</h3>
                        </div>
                    </div>
                </a>
                
                <!-- Category 2 -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden aspect-square">
                        <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22" alt="Men's Collection" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4">
                            <h3 class="text-white font-medium text-lg">Sistem Transmisi</h3>
                        </div>
                    </div>
                </a>
                
                <!-- Category 3 -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden aspect-square">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27" alt="Accessories" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4">
                            <h3 class="text-white font-medium text-lg">Kaki-kaki & Suspensi</h3>
                        </div>
                    </div>
                </a>
                
                <!-- Category 4 -->
                <a href="#" class="group">
                    <div class="relative rounded-xl overflow-hidden aspect-square">
                        <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772" alt="Footwear" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-4">
                            <h3 class="text-white font-medium text-lg">Accessories</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- New Arrivals Banner (New) -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-2xl overflow-hidden">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1573855619003-97b4799dcd8b" alt="New Collection" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-teal-900/90 to-transparent"></div>
                </div>
                <div class="relative py-16 px-8 md:py-24 md:px-12 lg:px-16 flex flex-col max-w-lg text-white">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal-400 text-teal-900 mb-4 w-fit">
                        New Arrivals
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Spring Collection 2025</h2>
                    <p class="text-white/80 mb-8">Discover our latest arrivals with fresh designs for the new season. Vibrant colors and breathable fabrics perfect for spring.</p>
                    <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-white text-teal-600 rounded-lg shadow-md transition-all duration-300 hover:bg-teal-50 hover:shadow-lg w-fit">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products Section with Enhanced Design -->
    <div id="featured-products" class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Featured Products</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-center">Handpicked selection of our most popular fashion items</p>
            </div>

            <!-- Search and Filter with Enhanced Design -->
            <form action="{{ route('home') }}" method="GET" class="bg-white p-6 rounded-xl shadow-sm mb-12">
                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1 min-w-0">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search for fashionable items..."
                                class="w-full pl-10 px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200">
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="w-full sm:w-auto">
                        <select name="category"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort Filter -->
                    <div class="w-full sm:w-auto">
                        <select name="sort"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High
                                to Low</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        </select>
                    </div>

                    <!-- Apply Filter Button -->
                    <div class="w-full sm:w-auto">
                        <button type="submit"
                            class="w-full px-6 py-3 bg-teal-500 text-white rounded-xl hover:bg-teal-600 transition-all shadow-md flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            <span>Filter Results</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Loading Animation -->
            <div id="loading-animation" class="flex justify-center my-12" style="display: none;">
                <div id="loading-lottie" class="w-24 h-24"></div>
            </div>

            <!-- Products Grid with Enhanced Card Design -->
            <div class="grid grid-cols-1 gap-6 sm:gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($products as $product)
                    <div class="product-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col"
                        data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                        data-image="{{ $product->getPrimaryImage() }}" data-category="{{ $product->category->name }}">
                        <div class="relative">
                            <!-- Badge for new or sale items -->
                            @if($product->created_at->diffInDays(now()) < 7)
                                <span class="absolute top-3 left-3 bg-teal-500 text-white text-xs font-medium px-2 py-1 rounded-full z-10">New</span>
                            @endif
                            
                            <img src="{{ $product->getPrimaryImage() }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
                                
                            <!-- Quick action overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button class="p-2 bg-white rounded-full mx-1 hover:bg-teal-500 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="p-2 bg-white rounded-full mx-1 hover:bg-teal-500 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4 sm:p-5 flex-grow flex flex-col">
                            <p class="text-sm text-teal-600 mb-1">{{ $product->category->name }}</p>
                            <h3 class="product-name text-lg font-medium text-gray-900 mb-1">{{ $product->name }}</h3>
                            <p class="product-description text-sm text-gray-500 mb-4 flex-grow">
                                {{ Str::limit($product->description, 70) }}
                            </p>
                            
                            <!-- Rating stars -->
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= 4)
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" opacity="0.3"></path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(4.0)</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-semibold text-teal-600">
                                    {{ $product->formatted_price }}</p>
                                <button
                                    class="add-to-cart px-4 py-2 text-sm bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-all flex items-center gap-1 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="flex justify-center mb-6">
                            <div id="empty-lottie" class="w-48 h-48"></div>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">No products found</h3>
                        <p class="text-gray-500 mb-6">Try adjusting your search or filter criteria</p>
                        <a href="/" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-all inline-block shadow-md">
                            Reset Filters
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination with Enhanced Design -->
            @if ($products->hasPages())
                <div class="mt-12">
                    <nav class="flex items-center justify-center flex-wrap gap-2">
                        {{ $products->links() }}
                    </nav>
                </div>
            @endif
        </div>
    </div>

    <!-- Testimonials Section (New) -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Hear from our satisfied fashion enthusiasts</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"The quality of their clothing is outstanding. I've been shopping here for months and every piece I've purchased has held up beautifully. Fast shipping too!"</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-semibold">SL</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-medium">Sarah L.</h4>
                            <p class="text-sm text-gray-500">Loyal Customer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"I love how they curate the latest fashion trends. The website is easy to navigate and their customer service team is incredibly helpful. My go-to fashion store!"</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-semibold">JD</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-medium">James D.</h4>
                            <p class="text-sm text-gray-500">Fashion Enthusiast</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Their sustainable fashion line is amazing. I appreciate a brand that cares about the environment while still delivering stylish, affordable pieces. Highly recommend!"</p>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-semibold">AM</div>
                        <div class="ml-3">
                            <h4 class="text-gray-900 font-medium">Aisha M.</h4>
                            <p class="text-sm text-gray-500">Eco-conscious Shopper</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section with Lottie Animation -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Shop With Us</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Experience fashion shopping like never before</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1: Quality -->
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-md transition-all">
                    <div class="h-32 mb-4 flex items-center justify-center">
                        <div id="quality-lottie" class="w-32 h-32"></div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Premium Quality</h3>
                    <p class="text-gray-600">We source only the finest fabrics and materials for long-lasting fashion</p>
                </div>
                
                <!-- Feature 2: Shipping -->
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-md transition-all">
                    <div class="h-32 mb-4 flex items-center justify-center">
                        <div id="shipping-lottie" class="w-32 h-32"></div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Get your fashion delivered to your doorstep within 2-4 business days</p>
                </div>
                
                <!-- Feature 3: Returns -->
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-md transition-all">
                    <div class="h-32 mb-4 flex items-center justify-center">
                        <div id="returns-lottie" class="w-32 h-32"></div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Easy Returns</h3>
                    <p class="text-gray-600">Not satisfied? Return within 30 days for a full refund, no questions asked</p>
                </div>
                
                <!-- Feature 4: Support -->
                <div class="bg-white rounded-xl p-6 text-center hover:shadow-md transition-all">
                    <div class="h-32 mb-4 flex items-center justify-center">
                        <div id="support-lottie" class="w-32 h-32"></div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Our fashion experts are always available to assist with your shopping needs</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Fashion Instagram Feed Section (New) -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Style Inspiration</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Follow us on Instagram for daily fashion inspiration <span class="text-teal-500">@stylique</span></p>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                <!-- Instagram Post 1 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
                
                <!-- Instagram Post 2 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
                
                <!-- Instagram Post 3 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1485968579580-b6d095142e6e" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
                
                <!-- Instagram Post 4 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
                
                <!-- Instagram Post 5 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1495385794356-15371f348c31" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
                
                <!-- Instagram Post 6 -->
                <a href="#" class="group relative aspect-square rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1475180098004-ca77a66827be" alt="Instagram Fashion" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </a>
            </div>
            
            <div class="text-center mt-8">
                <a href="#" class="inline-flex items-center justify-center px-6 py-3 border-2 border-teal-500 text-teal-600 rounded-lg hover:bg-teal-50 transition-colors">
                    Follow on Instagram
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Newsletter Section with Enhanced Design -->
    <div id="newsletter-section" class="relative bg-gradient-to-br from-teal-50 via-white to-teal-100 py-16">
        <!-- Decorative background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-0 left-0 w-72 h-72 bg-teal-200/20 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2">
            </div>
            <div
                class="absolute bottom-0 right-0 w-72 h-72 bg-teal-300/20 rounded-full blur-3xl transform translate-x-1/2 translate-y-1/2">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-8 items-center">
                <!-- Newsletter Content -->
                <div class="md:col-span-3 text-center md:text-left">
                    <!-- Section title with gradient -->
                    <h2
                        class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-teal-600 to-teal-400 bg-clip-text text-transparent mb-4">
                        Join Our Fashion Community
                    </h2>

                    <p class="text-base sm:text-lg text-gray-600 mb-6 max-w-xl">
                        Subscribe to our newsletter for exclusive style tips, trend forecasts, and special offers directly to your inbox.
                    </p>

                    <!-- Newsletter form with enhanced styling -->
                    <form id="newsletter-form" class="flex flex-col sm:flex-row gap-3 max-w-lg">
                        @csrf
                        <div class="relative flex-1">
                            <!-- Email icon -->
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" name="email" placeholder="Enter your email address"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 shadow-sm transition-all duration-300 text-sm">
                        </div>

                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white text-sm font-medium rounded-xl hover:from-teal-700 hover:to-teal-600 active:scale-95 transition-all duration-300 shadow-md">
                            <span>Subscribe</span>
                            <svg class="w-4 h-4 ml-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>

                    <!-- Additional benefits text -->
                    <p class="mt-4 text-sm text-gray-500">
                        🎁 Get 15% off your first order • 📱 Weekly style guides • 🔒 No spam, unsubscribe anytime
                    </p>
                </div>
                
                <!-- Newsletter Animation -->
                <div class="md:col-span-2 flex justify-center">
                    <div id="newsletter-lottie" class="w-full max-w-xs h-60"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Lottie Player Script -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <!-- Initialize Lottie Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Animation - Fashion shopping or style animation
            const heroLottie = document.getElementById('hero-lottie');
            if (heroLottie) {
                const heroPlayer = document.createElement('lottie-player');
                heroPlayer.src = "https://assets9.lottiefiles.com/packages/lf20_jcikwtux.json"; // Fashion shopping animation
                heroPlayer.background = "transparent";
                heroPlayer.speed = "1";
                heroPlayer.loop = true;
                heroPlayer.autoplay = true;
                heroLottie.appendChild(heroPlayer);
            }
            
           
            // Features Section Animations
            const qualityLottie = document.getElementById('quality-lottie');
            if (qualityLottie) {
                const qualityPlayer = document.createElement('lottie-player');
                qualityPlayer.src = "https://lottie.host/a1f66dff-d349-40c1-bb2e-b143ead152ee/bRO1cYDJXr.json"; // Quality check animation
                qualityPlayer.background = "transparent";
                qualityPlayer.speed = "1";
                qualityPlayer.loop = true;
                qualityPlayer.autoplay = true;
                qualityLottie.appendChild(qualityPlayer);
            }
            
            const shippingLottie = document.getElementById('shipping-lottie');
            if (shippingLottie) {
                const shippingPlayer = document.createElement('lottie-player');
                shippingPlayer.src = "https://lottie.host/f1d69b75-e4fd-4d89-915d-48302f572cee/odQau8nm6Y.json"; // Delivery animation
                shippingPlayer.background = "transparent";
                shippingPlayer.speed = "1";
                shippingPlayer.loop = true;
                shippingPlayer.autoplay = true;
                shippingLottie.appendChild(shippingPlayer);
            }
            const returnsLottie = document.getElementById('returns-lottie');
            if (returnsLottie) {
                const returnsPlayer = document.createElement('lottie-player');
                returnsPlayer.src = "https://lottie.host/0256b350-10fe-4676-929d-14f73ff4e34d/k4BqOhaGlh.json"; // Returns or refund animation
                returnsPlayer.background = "transparent";
                returnsPlayer.speed = "1";
                returnsPlayer.loop = true;
                returnsPlayer.autoplay = true;
                returnsLottie.appendChild(returnsPlayer);
            }
            
            const supportLottie = document.getElementById('support-lottie');
            if (supportLottie) {
                const supportPlayer = document.createElement('lottie-player');
                supportPlayer.src = "https://assets5.lottiefiles.com/packages/lf20_49rdyysj.json"; // Customer support animation
                supportPlayer.background = "transparent";
                supportPlayer.speed = "1";
                supportPlayer.loop = true;
                supportPlayer.autoplay = true;
                supportLottie.appendChild(supportPlayer);
            }
            
            // Newsletter Animation
            const newsletterLottie = document.getElementById('newsletter-lottie');
            if (newsletterLottie) {
                const newsletterPlayer = document.createElement('lottie-player');
                newsletterPlayer.src = "https://lottie.host/f064a07c-6b76-441e-8ac0-aeb9740178e6/0os7nRjLCo.json"; // Email or newsletter animation
                newsletterPlayer.background = "transparent";
                newsletterPlayer.speed = "1";
                newsletterPlayer.loop = true;
                newsletterPlayer.autoplay = true;
                newsletterLottie.appendChild(newsletterPlayer);
            }
            
            // Empty State Animation
            const emptyLottie = document.getElementById('empty-lottie');
            if (emptyLottie) {
                const emptyPlayer = document.createElement('lottie-player');
                emptyPlayer.src = "https://assets9.lottiefiles.com/packages/lf20_qpwbiyxf.json"; // Empty state or search animation
                emptyPlayer.background = "transparent";
                emptyPlayer.speed = "1";
                emptyPlayer.loop = true;
                emptyPlayer.autoplay = true;
                emptyLottie.appendChild(emptyPlayer);
            }
            
            // Loading Animation
            const loadingLottie = document.getElementById('loading-lottie');
            if (loadingLottie) {
                const loadingPlayer = document.createElement('lottie-player');
                loadingPlayer.src = "https://assets9.lottiefiles.com/datafiles/bEYvzB8QfV3EM9a/data.json"; // Loading animation
                loadingPlayer.background = "transparent";
                loadingPlayer.speed = "1";
                loadingPlayer.loop = true;
                loadingPlayer.autoplay = true;
                loadingLottie.appendChild(loadingPlayer);
            }
        });
        
        // Function to show loading animation when filtering products
        document.querySelectorAll('form').forEach(form => {
            if (!form.id || form.id !== 'newsletter-form') {
                form.addEventListener('submit', function() {
                    const loadingAnimation = document.getElementById('loading-animation');
                    if (loadingAnimation) {
                        loadingAnimation.style.display = 'flex';
                    }
                });
            }
        });
        
        // Add to cart functionality
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productCard = this.closest('.product-card');
                const productId = productCard.dataset.id;
                const productName = productCard.dataset.name;
                const productPrice = productCard.dataset.price;
                
                // Show add to cart animation
                this.innerHTML = '<svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Adding...';
                
                // Simulate adding to cart
                setTimeout(() => {
                    this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Added';
                    this.classList.remove('bg-teal-500', 'hover:bg-teal-600');
                    this.classList.add('bg-green-500', 'hover:bg-green-600');
                    
                    // Update cart count
                    const cartCount = document.getElementById('cart-count');
                    if (cartCount) {
                        const currentCount = parseInt(cartCount.textContent || '0');
                        cartCount.textContent = currentCount + 1;
                        cartCount.style.display = 'flex';
                        
                        // Animation for cart count
                        cartCount.classList.add('scale-125');
                        setTimeout(() => {
                            cartCount.classList.remove('scale-125');
                        }, 300);
                    }
                    
                    // Show notification
                    const notification = document.createElement('div');
                    notification.className = 'fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-0 z-50 bg-teal-500 text-white';
                    notification.textContent = `${productName} added to cart`;
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.classList.add('translate-y-full');
                        setTimeout(() => notification.remove(), 300);
                    }, 3000);
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> Add to Cart';
                        this.classList.remove('bg-green-500', 'hover:bg-green-600');
                        this.classList.add('bg-teal-500', 'hover:bg-teal-600');
                    }, 2000);
                    
                }, 800);
                
                // Here you would typically send an AJAX request to add the item to cart
                console.log(`Added product ${productName} (ID: ${productId}, Price: ${productPrice}) to cart`);
            });
        });
        
        // Newsletter form handling
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const emailInput = this.querySelector('input[name="email"]');
                const email = emailInput.value.trim();
                
                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    // Show error
                    emailInput.classList.add('border-red-500', 'ring-red-200');
                    return;
                }
                
                // Success handling
                emailInput.classList.remove('border-red-500', 'ring-red-200');
                emailInput.classList.add('border-green-500', 'ring-green-200');
                
                // Simulate form submission
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Subscribing...';
                
                // Show success message after delay
                setTimeout(() => {
                    newsletterForm.innerHTML = `
                        <div class="bg-teal-50 border border-teal-200 rounded-xl p-4 text-center">
                            <svg class="w-12 h-12 text-teal-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-teal-800 mb-1">Thanks for subscribing!</h3>
                            <p class="text-teal-600">Check your email for the welcome discount code.</p>
                        </div>
                    `;
                }, 1500);
                
                console.log(`Newsletter subscription: ${email}`);
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Offset for fixed header
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Initialize product image galleries if any
        document.querySelectorAll('.product-gallery').forEach(gallery => {
            const mainImage = gallery.querySelector('.main-image');
            const thumbnails = gallery.querySelectorAll('.thumbnail');
            
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    // Update active thumbnail
                    thumbnails.forEach(t => t.classList.remove('ring-teal-500'));
                    this.classList.add('ring-teal-500');
                    
                    // Update main image
                    if (mainImage) {
                        mainImage.src = this.dataset.src;
                        mainImage.alt = this.dataset.alt;
                    }
                });
            });
        });
        
        // Quick view modal functionality
        document.querySelectorAll('[data-action="quick-view"]').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const productId = this.dataset.productId;
                const modal = document.getElementById(`quick-view-modal-${productId}`);
                
                if (modal) {
                    // Show modal
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    
                    // Close modal when clicking outside or on close button
                    modal.addEventListener('click', function(e) {
                        if (e.target === this || e.target.classList.contains('close-modal')) {
                            this.classList.add('hidden');
                            document.body.style.overflow = 'auto';
                        }
                    });
                }
            });
        });
        
        // Scroll-triggered animations
        const animateOnScroll = function() {
            const elements = document.querySelectorAll('.fade-in, .slide-up, .slide-in-left, .slide-in-right');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        };
        
        // Initialize animations
        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Run once on page load
        
        // Wishlist functionality
        document.querySelectorAll('.add-to-wishlist').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                const icon = this.querySelector('svg');
                
                // Toggle filled/outlined heart icon
                if (this.classList.contains('wishlist-active')) {
                    this.classList.remove('wishlist-active');
                    this.querySelector('svg').outerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>';
                } else {
                    this.classList.add('wishlist-active');
                    this.querySelector('svg').outerHTML = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>';
                    
                    // Show notification
                    const notification = document.createElement('div');
                    notification.className = 'fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-0 z-50 bg-pink-500 text-white';
                    notification.textContent = 'Added to your wishlist';
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.classList.add('translate-y-full');
                        setTimeout(() => notification.remove(), 300);
                    }, 2000);
                }
            });
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Initialize countdown timer for limited offers if any
        const countdownElements = document.querySelectorAll('.countdown-timer');
        
        countdownElements.forEach(element => {
            const endTime = new Date(element.dataset.endtime).getTime();
            
            const updateTimer = function() {
                const now = new Date().getTime();
                const distance = endTime - now;
                
                if (distance <= 0) {
                    clearInterval(interval);
                    element.innerHTML = '<span class="text-red-500">Expired</span>';
                    return;
                }
                
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                element.innerHTML = `
                    <div class="flex justify-center items-center gap-2">
                        <div class="bg-gray-900 text-white rounded-md px-2 py-1 text-sm">${days}d</div>
                        <div class="bg-gray-900 text-white rounded-md px-2 py-1 text-sm">${hours}h</div>
                        <div class="bg-gray-900 text-white rounded-md px-2 py-1 text-sm">${minutes}m</div>
                        <div class="bg-gray-900 text-white rounded-md px-2 py-1 text-sm">${seconds}s</div>
                    </div>
                `;
            };
            
            // Update immediately and then every second
            updateTimer();
            const interval = setInterval(updateTimer, 1000);
        });
    </script>
    
    <!-- Main App Script -->
    <script type="module" src="{{ asset('js/app.js') }}"></script>
@endpush