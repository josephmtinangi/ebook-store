<div class="thumbnail">
	<div class="book">
		<a href="{{ route('books.show', $book->slug) }}">
			<img src="{{ $book->imageUrl() }}" alt="">
		</a>
		<div class="caption">
			<h3>
				<a href="{{ route('books.show', $book->slug) }}">
					{{ $book->title }}
				</a>
			</h3>
			<p>{{ str_limit($book->description, 200) }}</p>
			<p>Uploaded by <a href="{{ route('profile', $book->user->username) }}">{{ $book->user->name }}</a></p>
			<p>Downloads: <span class="badge">{{ $book->downloads() }}</span></p>
			<p class="text-muted">{{ $book->created_at->toDateTimeString() }}</p>
		</div>
	</div>	
</div>