
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="stylesheet" href="static/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="static/css/custom.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="static/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a href="../" class="navbar-brand">E-Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Bantuan</a>
            </li>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">
<!-- konten -->

      <table id="tabel-data" class="table table-striped table-hover">
          <thead>
              <tr>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Job Title</th>
                  <th>Email</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
          <?php
              include("config.php");

              $employee = mysqli_query($db,"select * from perkara_banding");
              while($row = mysqli_fetch_array($employee))
              {
                  echo "<tr>
                  <td>".$row['perkara_id']."</td>
                  <td>".$row['nomor_perkara_pn']."</td>
                  <td>".$row['putusan_pn']."</td>
                  <td>".$row['permohonan_banding']."</td>
                  <td>

                  <a href='data.php?id=".$row['perkara_id']."' class='btn btn-success btn-sm'>Cetak</a>
                  </td>
              </tr>";
              }
          ?>
          </tbody>

          <script>
          $(document).ready(function(){
              $('#tabel-data').DataTable({
                "order":[[3,"desc"]]
              });
          });
      </script>

      </table>
<!-- end konten -->
      <footer id="footer">
        <div class="row">
          <div class="col-lg-12">

            <ul class="list-unstyled">
              <li class="float-lg-right"><a href="#top">Back to top</a></li>
              <li><a href="https://blog.bootswatch.com" onclick="pageTracker._link(this.href); return false;">Blog</a></li>
              <li><a href="https://blog.bootswatch.com/rss/">RSS</a></li>
              <li><a href="https://twitter.com/bootswatch">Twitter</a></li>
              <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
              <li><a href="#">API</a></li>
            </ul>
            <p>Made by <a href="#">Tim IT PTA Surabaya</a>.</p>
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/master/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="https://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="https://fontawesome.com/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>

          </div>
        </div>

      </footer>


    </div>


    
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/custom.js"></script>
  </body>
</html>
