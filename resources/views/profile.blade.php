<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  </head>
  <body>
    

<div class="bg-s text-primary-foreground min-h-screen">
  <header class="bg-primary py-4">
    <div class="container mx-auto flex items-center justify-between">
      <h1 class="text-2xl font-bold">User Profile</h1>
      <button class="bg-secondary text-secondary-foreground px-4 py-2 rounded-lg">Edit Profile</button>
    </div>
  </header>
  <div class="container mx-auto mt-8">
    <div class="bg-card p-6 rounded-lg shadow-lg">
      <div class="flex items-center">
        <img src="https://placehold.co/150x150" alt="User Avatar" class="w-20 h-20 rounded-full" />
        <div class="ml-4">
          <h2 class="text-xl font-bold">{{$client->name}}</h2>
          <p class="text-secondary"></p>
        </div>
      </div>
      <div class="mt-4">
        <h3 class="text-lg font-semibold">About Me</h3>
        <p class="mt-2"></p>
      </div>
      <div class="mt-4">
        <h3 class="text-lg font-semibold">Contact Information</h3>
        <ul class="mt-2">
          <li>Email: {{$client->email}}</li>
          <li>Phone: +1 234 567 890</li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>


  </body>
</html>
</body>
</html>