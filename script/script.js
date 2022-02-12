function hasTouch() {
    return 'ontouchstart' in document.documentElement
           || navigator.maxTouchPoints > 0
           || navigator.msMaxTouchPoints > 0;
  }
  
  if (hasTouch()) { 
    try { 
      for (var si in document.styleSheets) {
        var styleSheet = document.styleSheets[si];
        if (!styleSheet.rules) continue;
  
        for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
          if (!styleSheet.rules[ri].selectorText) continue;
  
          if (styleSheet.rules[ri].selectorText.match(':hover')) {
            styleSheet.deleteRule(ri);
          }
        }
      }
    } catch (ex) {}
  }

  function navbar_change(){
    var whereiam =(document.title.substring(21,document.title.length));
    console.log("mi trovo nella sezione: " + whereiam);

    switch (whereiam){
      case "parole salvate":
        document.getElementById("modifica").innerHTML=('<IMG class="navb_img" SRC="../resources/navbar/sezione_parole_salvate_colorato.png"   ALT="parole salvate"></IMG>');
        break;
      
      case "dizionario":
        document.getElementById("modifica").innerHTML=('<IMG class="navb_img" SRC="../resources/navbar/sezione_dizionario_colorato.png"   ALT="dizionario"></IMG>');
        break;

      case "homepage":
          document.getElementById("homepage").innerHTML=('<img class="logo_img" src="resources/navbar/logo_navbar_colorato.png" alt="homepage">');
          break;

      case "cultura e letteratura":
        document.getElementById("modifica").innerHTML=('<IMG class="navb_img" SRC="../resources/navbar/sezione_letteratura_cultura_colorato.png" ALT="lingua e cultura"></IMG>');
        break;

      case "impostazioni":
  document.getElementById("modifica").innerHTML=('<IMG class="navb_img" SRC="../resources/navbar/sezione_impostazioni_colorato.png" ALT="impostazioni">');
        break;
    }

  }
