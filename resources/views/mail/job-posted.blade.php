<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->

    <h2>
        {{ $job->title }}
    </h2>
    <p>
        Congrats! Your job is now live on our website.
    </p>

    <p>
        <a href="{{ url("/jobs/$job->id") }}">View Your Job Listings</a>
    </p>
</div>
