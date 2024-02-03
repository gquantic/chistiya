<div class="categories-display mb-4">
    @foreach(\App\Models\Catalogue\Category::all() as $category)
        <a href="{{ route('categories.show', $category->slug) }}" class="categories-display__item">
            {{ $category->title }}
        </a>
    @endforeach
</div>
