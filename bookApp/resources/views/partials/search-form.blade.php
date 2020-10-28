<form action="/search" method="get">
    @csrf
    <label for="search" class="hidden">Chercher dans l'application :</label>
    <input type="search" id="search" name="search" required placeholder="Livre ou étudiants"
           aria-label="Search through site content">
    <input type="submit">
</form>
