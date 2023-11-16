class Menumainf extends HTMLElement{
    constructor(){
        super();
    }

    connectedCallback(){
        this.innerHTML=`
        <footer>
    <div>
    <ul class="footer_ul">
        <li>Correo: servicioalcliente@icecream.com.co</li>
        <li>WhatsApp (+57) 3104552351 </li>        
    </ul>
    </div>
    <nav>
        <img src="./images/whatsapp.svg" alt="" width="40" height="40">
    </nav>
</footer>
`;


    }
    
}
window.customElements.define("menu-main-footer",Menumainf);

