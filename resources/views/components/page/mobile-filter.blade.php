<!-- Mobile Filter Offcanvas -->
@php
    // request('cate') ni arrayga aylantirish
    $selectedCategories = request('cate');

    if (!is_array($selectedCategories)) {
        if ($selectedCategories) {
            // Agar "4,5,6" ko'rinishda kelgan bo'lsa, explode qiling
            $selectedCategories = explode(',', $selectedCategories);
        } else {
            $selectedCategories = [];
        }
    }
@endphp
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileFilter" aria-labelledby="mobileFilterLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="mobileFilterLabel">Filterlar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <form action="{{ route('page.service') }}" method="GET" id="filterForm" class="p-2">
            {{-- Search --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">🔍 Kalit So‘z Bo‘yicha Qidirish</label>
                <input type="text" name="keywords" class="form-control" placeholder="Kerakli xizmatni kiriting"
                    value="{{ request('keywords') }}">
            </div>

            {{-- Categories --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">📂 Kategoriyalar</label>
                <div class="ps-2">
                    @foreach ($categories as $category)
                    <div class="form-check">
                        <input name="cate[]" value="{{ $category->id }}" class="form-check-input filter_category"
                            type="checkbox" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}
                        id="cate_{{ $category->id }}">
                        <label class="form-check-label" for="cate_{{ $category->id }}">
                            {{ $category->title_uz }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Location --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">📍 Joylashuv</label>
                <select class="form-select" name="location">
                    <option value="">Joyni tanlang</option>
                    {{-- Add your location options dynamically here --}}
                </select>
            </div>

            {{-- Price Range --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">💵 Narxlar Oralig‘i</label>
                <input type="text" class="form-control" name="range_price" placeholder="100000 - 1000000"
                    value="{{ request('range_price') }}">
            </div>

            {{-- Rating --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">⭐ Rating</label>
                <div class="ps-2">
                    @foreach ([5, 4, 3, 2, 1] as $rate)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="rating[]" value="{{ $rate }}"
                            id="rating_{{ $rate }}" {{ in_array($rate, request('rating', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="rating_{{ $rate }}">
                            {{ $rate }}★ va yuqori
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-dark w-100 mt-3">🎯 Filterni qo‘llash</button>
            </div>
        </form>
    </div>
</div>
