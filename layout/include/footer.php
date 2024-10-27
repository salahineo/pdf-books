  <!-- Start Footer -->
  <footer>
    <div class="container">
      <div class="row d-flex flex-column flex-md-row justify-content-center align-content-center">
        <div class="copy">
          &copy; <span id="footer-copyright-year"></span> | <a href="https://salahineo.com" rel="noopener" target="_blank">Mohamed Salah</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Scripts -->
  <script src="layout/js/jquery-3.4.1.min.js"></script>
  <script src="layout/js/bootstrap.min.js"></script>
  <script>
    // New date Object
    let currentDate = new Date();
    // Get Copyright Year Span
    document.getElementById("footer-copyright-year").innerHTML = String(currentDate.getFullYear());
  </script>
  <!-- End Scripts -->
</body>
</html>
