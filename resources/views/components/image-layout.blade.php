<div>
        @if ($user->img_url !== null)
        <img src="{{ asset('storage/' . $user->img_url) }}" alt="No photo" class="border border-primary rounded-circle" style="max-width: 40px;">
        @else
        <img src="https://crestedcranesolutions.com/wp-content/uploads/2013/07/facebook-profile-picture-no-pic-avatar.jpg" alt="No profile picture" class="border border-primary rounded-circle" style="max-width: 40px;">
        @endif
</div>