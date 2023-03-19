<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
<div class="rating-stars">
    @for ($i = 0; $i < 5; $i++)
        <i class="fa-star {{ ($rating - $i) > 1 ? 'fa-solid on' : 'fa-regular' }}"></i>
    @endfor
    <p style="display: inline; margin-left: 10px;">{{ $rating }} out of 5</p>
</div>
