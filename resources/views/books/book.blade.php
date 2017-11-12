<div class="media">
	<a class="pull-left" href="{{ route('books.show', $book->slug) }}">
		<img class="media-object" src="{{ $book->imageUrl() }}" alt="Image">
	</a>
	<div class="media-body">
		<h4 class="media-heading">{{ $book->title }}</h4>
		<p>{{ $book->description }}</p>
		<p>Uploaded by {{ $book->user->name }}</p>
		<p class="text-muted">{{ $book->created_at->toDateTimeString() }}</p>
	</div>
</div>