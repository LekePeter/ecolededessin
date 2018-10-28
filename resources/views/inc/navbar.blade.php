<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top nav-bar-bg">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{asset('img/favicon.ico')}}" height="30">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="about">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="project">Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="contact">Contact</a>
      </li>
    </ul>
  </div>
</nav>