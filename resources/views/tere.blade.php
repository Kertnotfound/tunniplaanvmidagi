<ul>
    @foreach ($authors as $author)
        <li>{{ $author->name }}</li>
        <ul>
            <li><b>Reviews:</b></li>
            <ul>
                @foreach ($author->reviews as $review)
                    <li>{{ $review->content }} - <i>{{ $review->reviewer }}</i></li>
                @endforeach
            </ul>
        </ul>
        <ul>
            <li><b>Books:</b></li>
            <ul>
                @foreach ($author->books as $book)
                    <li><b>{{ $book->title }}</b></li>
                    <ul>
                        @foreach ($book->reviews as $review)
                            <li>{{ $review->content }} - <i>{{ $review->reviewer }}</i></li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>

        </ul>
    @endforeach
</ul>
