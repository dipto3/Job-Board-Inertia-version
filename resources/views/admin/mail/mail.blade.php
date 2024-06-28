<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Posted</title>
</head>

<body>

    <h2>{{ $job->title }}</h2>
    <p><strong>Category:</strong> {{ $job->category->name }}</p>
    <p><strong>Location:</strong> {{ $job->location }}</p>
    <p><strong>Published:</strong> {{ $job->published }}</p>
    <p><strong>Deadline:</strong> {{ $job->deadline }}</p>
    <p><strong>Salary:</strong> {{ $job->salary }}</p>
    <p><strong>Employment Type:</strong> {{ $job->employment_type }}</p>
    <p><strong>Experience:</strong> {{ $job->experience }}</p>
    <p><strong>Gender:</strong> {{ $job->gender }}</p>
    <p><strong>Description:</strong> {!! $job->description !!}</p>

    <p><a href="{{ route('job.description', $job->uuid) }}">View Job</a></p>
</body>

</html>
