<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
  <title>Fixed Navbar with Tailwind CSS</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="fixed top-0 left-0 w-full z-50 p-4">
    <div class="container mx-auto">
      <h1 class="text-white text-lg">Navbar</h1>
    </div>
  </nav>

  <!-- Content -->
  <div class="relative mt-16">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold">Konten Utama</h2>
      <p>Ini adalah contoh konten yang berada di bawah navbar.</p>
      <!-- Tambahkan konten lain di sini -->
    </div>
  </div>
</body>
</html>
