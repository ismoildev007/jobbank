<!-- Mobile Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileFilter" aria-labelledby="mobileFilterLabel">
    <div class="offcanvas-header">
        <h5 id="mobileFilterLabel">Filterlar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('page.service') }}" method="GET" id="filterForm">
            <div class="mb-3">
                <label class="form-label">Kalit So‘z Bo‘yicha Qidirish</label>
                <input type="text" name="keywords" class="form-control" placeholder="Kerakli xizmatni kiriting" value="{{ request('keywords') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategoriyalar</label>
                @foreach ($categories as $category)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cate[]" value="{{ $category->id }}" id="cat_{{ $category->id }}"
                            {{ in_array($category->id, request('cate', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="cat_{{ $category->id }}">
                            {{ $category->title_uz }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label class="form-label">Joylashuv</label>
                <select class="form-select" name="location">
                    <option value="">Joyni Tanlang</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Narxlar oralig‘i</label>
                <input type="text" class="form-control" name="range_price" placeholder="100000 - 1000000" value="{{ request('range_price') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                @foreach ([5, 4, 3, 2, 1] as $rate)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="rating[]" value="{{ $rate }}" id="rating_{{ $rate }}"
                            {{ in_array($rate, request('rating', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="rating_{{ $rate }}">
                            {{ $rate }}★ va yuqori
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-dark w-100 mt-3">Filterni qo‘llash</button>
        </form>
    </div>
</div>
