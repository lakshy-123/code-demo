// /function getnumber(min,max){
//     return Math.floor(Math.random()*(max-min+1))+min;
// }

//project 


 let BASE_URL="https://v6.exchangerate-api.com/v6/b7b1d233bee357357835c041/pair";

const dropdown=document.querySelectorAll(".dropdown select");
console.log(dropdown);
let mybtn=document.querySelector("form button");
let fromcurrency= document.querySelector(".from select");
let tocurrency=document.querySelector(".to select");
 let msg= document.querySelector(".msg");
 console.log(msg);
 let toggle=document.getElementById("toggle");
 console.log(toggle);
const borderEffect=()=>{
    toggle.style.borderColor="orange";

}
 toggle.addEventListener("click",borderEffect);




  
// /for(code in countryList ){
//     console.log(code,countryList[code]);
// }
// access in select element country
for(let select of dropdown){
    for(let currency in countryList){
        let newoption=document.createElement("option");
        newoption.innerText=currency;
        newoption.value=currency;
        if(select.name ==="to" && currency=== "USD"){
          newoption.selected="selected";
        }
        else if(select.name ==="from" && currency === "INR"){
            newoption.selected="selected";


          

        }
        select.append(newoption);
    } 
    select.addEventListener("change",(evt)=>{
        update(evt.target);

    });

        
}

const update=(element)=>{
    console.log(element);
    let currency=element.value;
    let currencychange=countryList[currency];
    let imgchange=`https://flagsapi.com/${currencychange}/flat/64.png`;
    let img= element.parentElement.querySelector("img");
     img.src=imgchange;
}

  
 mybtn.addEventListener("click",  async (evt)=>{
    let amount =document.querySelector(".amount input");
    evt.preventDefault();
    mybtn.style.borderColor="orange";
    let amtval= amount.value;
    console.log(amtval);
    if(amtval ==="" || amtval<1){
        amtval= 1;
        amount.value="1";
    }
    console.log(fromcurrency.value,tocurrency.value);
    const URL=`${BASE_URL}/${fromcurrency.value}/${tocurrency.value}`;
    let response= await fetch(URL);
//    console.log(response);
    let data= await response.json();
    let rate=  data;
    console.log(rate.conversion_rate);

    let FinalAmount =amtval * rate.conversion_rate;
    msg.innerText=`${amtval} ${fromcurrency.value} = ${FinalAmount} ${tocurrency.value}`;
    });
