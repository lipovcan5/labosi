<!DOCTYPE html>

<html>
  <head>
    <link rel='stylesheet' type='text/css' href='.//css/style.css'>
    <link rel='stylesheet' type='text/css' href='.//css/grid.css'>
    <link rel='stylesheet' type='text/css' href='.//css/normalize.css'>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <script src='////ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'>
    </script>
    <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js'>
    </script>
    <script type='text/javascript' src='js/jquery.validate.js'>
    </script>
    <title>
      DWA2013
    </title>
  </head>
  <body>
    <header>
      <div class='row'>
        <div class='logo'>
          <img src='.//img/logo.png' alt='logo'>
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
            <a href='#'>
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
        <h2>
          Formular za upis pacijenata
        </h2>
        <form action='' method='POST'>
          <table class='unos'>
            <tr>
              <td>
                <label for='name'>
                  Ime:
                </label>
              </td>
              <td>
                <input id='name' type='text' name='firstname'>
              </td>
            </tr>
            <tr>
              <td>
                <label for='surname'>
                  Prezime:
                </label>
              </td>
              <td>
                <input id='surname' type='text' name='lastname'>
              </td>
            </tr>
            <tr>
              <td>
                <label for='spol'>
                  Spol:
                </label>
              </td>
              <td>
                <input id='spol' type='radio' name='gender' value='M' checked='checked'>
                M
                <br>
                <input id='spol' type='radio' name='gender' value='Ž½'>
                Ž
              </td>
              <tr>
                <td>
                  <label for='date'>
                    Datum roðenja:
                  </label>
                </td>
                <td>
                  <input id='date' type='date' name='birthDate'>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='city'>
                    Mjesto roðenja:
                  </label>
                </td>
                <td>
                  <input id='city' type='text' name='birthPlace'>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='adresa'>
                    Adresa i mjesto stanovanja:
                  </label>
                </td>
                <td>
                  <input id='id' type='text' name='address' adresa='adresa'>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='krvnaGrupa'>
                    Krvna grupa:
                  </label>
                </td>
                <td>
                  <select name='bloodGroup'>
                    <option value='A' checked='checked'>
                      A
                    </option>
                    <option value='B'>
                      B
                    </option>
                    <option value='AB'>
                      AB
                    </option>
                    <option value='0'>
                      0
                    </option>
                  </select>
                  <select name='bloodType'>
                    <option value='+'>
                      + (pos)
                    </option>
                    <option value='-'>
                      - (neg)
                    </option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='bolesti'>
                    Prijašnje medicinske tegobe (srèane tegobe, talk, virusne, bolesti (Hepatitis, HIV)):
                  </label>
                </td>
                <td>
                  <input id='bolesti' type='radio' name='diseases' value='DA' checked='checked'>
                  Da
                  <br>
                  <input id='bolest' type='radio' name='diseases' value='NE'>
                  Ne
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='tegobe'>
                    Koje tegobe osoba ima:
                  </label>
                </td>
                <td>
                  <input id='id' type='text' name='diseasesDescription' tegobe='tegobe'>
                </td>
              </tr>
              <tr>
                <td>
                  <label for='alergija'>
                    Jeli osoba alergièna na lijekove:
                  </label>
                </td>
                <td>
                  <input id='alergija' type='radio' name='allergy' value='DA' checked='checked'>
                  Da
                  <br>
                  <input id='alergija' type='radio' name='allergy' value='NE'>
                  NE
                  <br>
                  <input id='alergija' type='radio' name='allergy' value='NEZNA'>
                  Ne zna
                </td>
              </tr>
              <tr>
                <td>
                  <label for='lijek'>
                    Na koje lijekove je osoba alergièna:
                  </label>
                </td>
                <td>
                  <input id='lijek' type='text' name='allergyDescription'>
                </td>
              </tr>
              <tr>
                <td>
                </td>
                <td>
                  <input type='submit' value='Spremi'>
                </td>
              </tr>
              <tr>
                <td>
                </td>
                <td>
                  <?php $vijestLink = $basePageURL.'news/1'; ?>
                  <a href='<?php echo $vijestLink ?>' class='btn'>
                    Dalje
                  </a>
                </td>
              </tr>
            </tr>
          </table>
        </form>
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
