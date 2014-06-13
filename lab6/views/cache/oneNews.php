<!DOCTYPE html>

<html>
  <head>
    <link rel='stylesheet' type='text/css' href='.//css/style.css'>
    <link rel='stylesheet' type='text/css' href='.//css/grid.css'>
    <link rel='stylesheet' type='text/css' href='.//css/normalize.css'>
    <meta charset='UTF-8'>
    <!--script(src="js/jquery.js")-->
    <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js'>
    </script>
    <title>
      DWA2013
    </title>
  </head>
  <body>
    <header>
      <div class='row'>
        <div class='logo'>
          <img src='img/logo.png' alt='logo'>
        </div>
        <div class='status'>
          <a href='logout'>
            <button type='submit' data-toggle='button' style='position:relative; top:-4px' class='btn'>
              Odjava            
            </button>
          </a>
        </div>
      </div>
    </header>
    <div class='row wrapper'>
      <aside class='column column-4'>
        <ul>
          <li>
            <a href='zivotopis.php'>
              Osobni podaci
            </a>
          </li>
          <li>
            <a href='popis.php'>
              Popis pacijenata
            </a>
          </li>
          <li>
            <a href='unos.php'>
              Unos pacijenata
            </a>
          </li>
          <li>
            <a href='filtriranjePodataka.php'>
              Ispis podataka
            </a>
          </li>
        </ul>
      </aside>
      <article class='column column-8'>
        <p>
          ******* ispis pacijenata !!!!!!!!!!!!!!!!
        </p>
        <table class='unos'>
          <tr>
            <td>
              Ime:
            </td>
            <td>
              ');
              echo $_POST['firstname'];
              echo('
            </td>
          </tr>
          <tr>
            <td>
              Prezime:
            </td>
            <td>
              ');
              echo $_POST['lastname'];
              echo('
            </td>
          </tr>
          <tr>
            <td>
              Spol:
            </td>
            <td>
              ');
              echo $_POST['gender'];
              echo('
            </td>
            <tr>
              <td>
                Datum rođenja:
              </td>
              <td>
                ');
                echo $_POST['birthDate'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Mjesto rođenja:
              </td>
              <td>
                ');
                echo $_POST['birthPlace'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Krvna grupa:
              </td>
              <td>
                ');
                echo $_POST['address'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Tip krvi:
              </td>
              <td>
                ');
                echo $_POST['bloodGroup'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Bolesti:
              </td>
              <td>
                ');
                echo $_POST['diseases'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Opis bolesti:
              </td>
              <td>
                ');
                echo $_POST['diseasesDescription'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Alergije:
              </td>
              <td>
                ');
                echo $_POST['allergy'];
                echo('
              </td>
            </tr>
            <tr>
              <td>
                Opis alergije
              </td>
              <td>
                ');
                echo $_POST['allergyDescription'];
                echo('
              </td>
            </tr>
          </tr>
        </table>
        ');
        ?
      </article>
    </div>
    <footer>
      <div class='row'>
        <h4>
          Copyright ZKD, 2014
        </h4>
      </div>
    </footer>
  </body>
</html>
