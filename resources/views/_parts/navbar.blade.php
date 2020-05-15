 <nav id="override" class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">MDM Vets</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto w-100">
      <li class="nav-item">
        <a id="override" class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Owners</a>
      </li>
      <li class="nav-item">
        <form action="/owners/search" method="get">
            <input name="search" type="text" placeholder="Search..">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
      </li>
    </ul>
    <div>
    @if (Auth::check())
        <h4>Logged in</h3>
    @else
        <h4>Not logged in</h3>
    @endif 
    </div>
  </div>
</nav>