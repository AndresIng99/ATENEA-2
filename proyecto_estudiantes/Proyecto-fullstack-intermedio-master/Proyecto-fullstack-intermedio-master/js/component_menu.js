class Menumain extends HTMLElement {
    constructor() {
        console.log("error");
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <header>
    <div class="n1">
        <img src="./images/cono.svg" alt="logo" width="100" height="90">
        <h2>The Ice Cream Factory</h2>
    </div>    
    <nav>
        <ul>
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li>
                <a href="Product.html">Productos</a>
            </li>
            <li>
                <a href="us.html">Nosotros</a>                
            </li>
            <li>
                <a href="contact_info.html">Contacto</a>
            </li>
        </ul>
    </nav>
    <nav class="red">
        <img class="face" src="./images/facebook.svg" alt="" width="30" height="30">
        <img class="face" src="./images/instagram.svg" alt="" width="30" height="30">
        <img class="face" src="./images/twitter.svg" alt="" width="30" height="30">
    </nav>
</header>
`;
    }
}
window.customElements.define("menu-main", Menumain);

