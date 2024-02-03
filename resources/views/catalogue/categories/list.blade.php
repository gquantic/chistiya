<div class="categories-display mb-4">
    @foreach((new \App\Repositories\Catalogue\CategoryRepository())->all()->get() as $category)
        <a href="{{ route('categories.show', $category->slug) }}" class="categories-display__item">
            {{ $category->title }}
        </a>
    @endforeach
</div>
