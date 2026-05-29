function Validace(e) {
    e.preventDefault();

    let valid = true;

    let jmeno_produktu=document.getElementById("jmeno_produktu").value.trim();
    let kategorie=document.getElementById("kategorie").value.trim();
    let cena=document.getElementById("cena").value.trim();
    let ean=document.getElementById("ean").value.trim();
    let plu=document.getElementById("plu").value.trim();

    if(jmeno_produktu === "" || kategorie === "" || cena==="")
        {
        valid=false;
        alert("nevyplňěné údaje!");
        }
    else if(ean ==="" && plu ==="")
        {
        valid=false;
        alert("Nevyplňěné údaje!");
        }

    if(valid) {
        e.target.submit();
    }
}

function cena_a_dph()
{
    let cena= (parseFloat(document.getElementById("cena").value)*(1+(parseFloat(document.getElementById("dph").value))/100)).toFixed(2);
    document.getElementById("cena_dph").value=cena;
}

function cena_bez_dph()
{
    let cena= (parseFloat(document.getElementById("cena_dph").value)/(1+(parseFloat(document.getElementById("dph").value))/100)).toFixed(2);
    document.getElementById("cena").value=cena;
}

function aktualizace_dph()
{
    let cena1=document.getElementById("cena").value;
    let cena2=document.getElementById("cena_dph").value;
    if(cena1== "" || cena2==="")
        cena_a_dph();
}

    document.getElementById("cena").addEventListener("input", cena_a_dph);
    document.getElementById("dph").addEventListener("change", aktualizace_dph);
    document.getElementById("cena_dph").addEventListener("input", cena_bez_dph);
    document.querySelector(".novy_produkt form").addEventListener("submit", Validace);