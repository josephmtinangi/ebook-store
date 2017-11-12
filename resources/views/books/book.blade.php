<div class="media">
	<a class="pull-left" href="{{ route('books.show', $book->slug) }}">
		<img class="media-object" src="{{ $book->imageUrl() }}" alt="Image">
	</a>
	<div class="media-body">
		<h4 class="media-heading">
			<a href="{{ route('books.show', $book->slug) }}">
				{{ $book->title }}
			</a>
		</h4>
		<p>{{ $book->description }}</p>
		<p>Uploaded by <a href="{{ route('profile', $book->user->username) }}">{{ $book->user->name }}</a></p>
		<p>Downloads: <span class="badge">{{ $book->downloads() }}</span></p>
		<p class="text-muted">{{ $book->created_at->toDateTimeString() }}</p>
	</div>
</div>