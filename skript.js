let Pridanizbozi=0;
let pp=2;//Pocet polozek
//const sekce1=document.querySelector()
const sekce1=document.getElementById("sekce1");
const hlavnisekce=document.getElementById("hlavnisekce");
let obsahsekce1=sekce1.outerHTML;
const toolbar1=document.getElementById("toolbar");
const tlacitkatoolbaru=toolbar1.outerHTML;

function Pridatzbozi()
{  
    if(Pridanizbozi==0){
    console.log("ahoj");
    console.log(pp);
    const table=document.getElementById("main");
    const tr=document.createElement("tr");
    tr.id="tr"+pp;
    const td1=document.createElement("td");
    td1.id=pp+"td1";
    const td2=document.createElement("td");
    td2.id=pp+"td2";
    const td3=document.createElement("td");
    td3.id=pp+"td3";
    const td4=document.createElement("td");
    td4.id=pp+"td4";
    const td5=document.createElement("td");
    td5.id=pp+"td5";

    let inputnazev=document.createElement("input");
    inputnazev.type="text";
    inputnazev.placeholder="Zadejte název...";
    inputnazev.id="nazevnew"+pp;
    inputnazev.className="textinput";

    let inputmnozstvi=document.createElement("input");
    inputmnozstvi.type="text";
    inputmnozstvi.placeholder="Množství";
    inputmnozstvi.className ="inputmnozstvi";
    inputmnozstvi.id="mnozstvinew"+pp;

    let jednotka=document.createElement("select");
    let kusy=document.createElement("option");
    kusy.textContent="Ks";
    jednotka.appendChild(kusy);
    let kg=document.createElement("option");
    kg.textContent="Kg";

    jednotka.appendChild(kg);
    jednotka.id="jednotka"+pp;

    let kod=document.createElement("input");
    kod.type="text";
    kod.placeholder="Kód"
    kod.className="kod";
    kod.id="kodnew"+pp;
    kod.className="textinput";

    let ulozit=document.createElement("button");
    ulozit.textContent="Uložit";
    ulozit.className="ulozittlacitko";
    ulozit.onclick=Ulozit;
    ulozit.id="ulozit"+pp;

    let zrusit=document.createElement("button");
    zrusit.textContent="Zrušit";
    zrusit.className="zrusittlacitko";
    zrusit.onclick=Zrusit;
    zrusit.id="zrusit"+pp;

    td2.appendChild(inputnazev);
    td1.appendChild(ulozit);
    td1.appendChild(zrusit);
    td3.appendChild(inputmnozstvi);
    td3.appendChild(jednotka);
    td4.appendChild(kod);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);

    table.appendChild(tr);
    }
    Pridanizbozi++;
}

function Zrusit()
{
    let tr=document.getElementById("tr"+pp);
    let tb=document.getElementById("main");
    tb.removeChild(tr);
    Pridanizbozi=0;
}

function Ulozit()
{
    let chyba=0;
    console.log("ulozeno");
    let nazev=document.getElementById("nazevnew"+pp).value;
    let mnozstvi=document.getElementById("mnozstvinew"+pp).value;
    let kod=document.getElementById("kodnew"+pp).value;

    if(nazev=="")
    {
        Chybnyvstup("nazevnew"+pp);
        chyba++;
    }
    else
        Spravnyvstup("nazevnew"+pp);

    let number=parseInt(mnozstvi);
    if(!isNaN(number))
        Spravnyvstup("mnozstvinew"+pp);
    else
        {
        Chybnyvstup("mnozstvinew"+pp);
        chyba++;
        }

    number=parseInt(kod);
    if(!isNaN(number))
        Spravnyvstup("kodnew"+pp);
    else
        {
        Chybnyvstup("kodnew"+pp);
        chyba++;
        }

    if(chyba==0)
    {
        Ulozenivstupu(pp);
        pp++;
    }
}

function Chybnyvstup(id){
    let element=document.getElementById(id);
    element.style.border=" 2px solid red";
}

function Spravnyvstup(id)
{
    let element=document.getElementById(id);
    element.style.border =" 1px solid black";
}

function Ulozenivstupu(pp){
    let nazev=document.getElementById("nazevnew"+pp);
    let nazev2=document.getElementById("nazevnew"+pp).value;
    let td2=document.getElementById(pp+"td2");
    td2.removeChild(nazev);
    //let fnazev=document.createElement("p");//f=finální
    //fnazev.id="el"+pp+"td2";
    //fnazev.textContent=nazev2;
    //td2.appendChild(fnazev);
    td2.textContent=nazev2;

    let ulozit=document.getElementById("ulozit"+pp);
    let zrusit=document.getElementById("zrusit"+pp);
    let td1=document.getElementById(pp+"td1");
    td1.removeChild(ulozit);
    td1.removeChild(zrusit);

    let hodnota;
    //let stav=document.createElement("p");
    let pocet1=document.getElementById("mnozstvinew"+pp).value;
    let pocet=parseInt(pocet1);
    if(pocet>0)
        hodnota="🟢Skladem";
    else
        hodnota="🔴Není skladem";
    console.log(pocet);

    td1.textContent=hodnota;
    //td1.appendChild(stav);
    //stav.textContent=hodnota;

    let td3=document.getElementById(pp+"td3");
    let mnozstvi3=document.getElementById("mnozstvinew"+pp);
    let mnozstvi2=document.getElementById("mnozstvinew"+pp).value;
    let jednotka=document.getElementById("jednotka"+pp).value;
    let jednotka2=document.getElementById("jednotka"+pp);
    let mnozstvi=document.createElement("p");
    //mnozstvi.id="el"+pp+"td3";
    //mnozstvi.textContent=mnozstvi2+" "+jednotka;
    td3.removeChild(mnozstvi3)
    td3.removeChild(jednotka2);
    //td3.appendChild(mnozstvi);
    td3.textContent=mnozstvi2 +" "+jednotka;

    let td4=document.getElementById(pp+"td4");
    let kod=document.getElementById("kodnew"+pp);
    let kod2=document.getElementById("kodnew"+pp).value;
    console.log("kodnew"+pp);
    td4.removeChild(kod);
    /*let fkod=document.createElement("p");
    fkod.id="el"+pp+"td4";
    fkod.textContent=kod2;
    td4.appendChild(fkod);*/
    td4.textContent=kod2;

    let td5=document.getElementById(pp+"td5");
    td5.textContent=pp;
    //let id=document.createElement("p");
    //id.textContent=pp;
    //td5.appendChild(id);

    let tb=document.getElementById("toolbar");
    Pridanizbozi=0;
    obsahsekce1=sekce1.outerHTML;
    obsahtoolbar=toolbar.outerHTML;
}

function Prehled(){
    
}

function Export()
{
    let tb=document.getElementById("toolbar");
    sekce1.textContent="";
    tb.textContent="";
    tb.insertAdjacentHTML("beforeend",`
        <h1>Export dat do CSV</h1>
        `
    );

    
    sekce1.insertAdjacentHTML("beforeend",`
        <textarea class="csvexport"></textarea>
        <button class="exporttlacitko">Exportovat</button>
        `);
}