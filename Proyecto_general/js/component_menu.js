class menumain extends HTMLElement{
    constructor(){
        super();
    }

    connectedCallback(){
        this.innerHTML = `
        <img src="../img/logo.png" alt="">
            <nav>
                <ul>
                    <li>
                        <a href="modulo1.php">
                            <lord-icon class="icon"
                                title="Planeación presupuestal del mes"
                                src="https://cdn.lordicon.com/ksdjzsym.json"
                                trigger="hover">
                            </lord-icon>
                        </a>
                    </li>
                    <li>
                        <a href="modulo2.php">
                            <lord-icon class="icon"
                                title="Registro de ingresos y gastos"
                                src="https://cdn.lordicon.com/ofklvwkr.json"
                                trigger="hover">
                            </lord-icon>
                        </a>
                    </li>
                    <li>
                        <a href="modulo3.php">
                            <lord-icon class="icon"
                                title="Administra tus propias categorías"
                                src="https://cdn.lordicon.com/wzwygmng.json"
                                trigger="hover">
                            </lord-icon>
                        </a>
                    </li>
                    <li>
                        <a href="modulo4.php">
                            <lord-icon class="icon"
                                title="Calculadora de interés compuestos"
                                src="https://cdn.lordicon.com/iiuaqmnt.json"
                                trigger="hover">
                            </lord-icon>
                        </a>
                    </li>
                    <li>
                        <a href="modulo5.php">
                            <lord-icon class="icon"
                                title="Dashboard de seguimiento globalizado"
                                src="https://cdn.lordicon.com/abwrkdvl.json"
                                trigger="hover">
                            </lord-icon>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="exit">
                <a href="../db/logout.php">
                    <lord-icon class="icon"
                        src="https://cdn.lordicon.com/gwvmctbb.json"
                        trigger="boomerang"
                        colors="primary:#545454,secondary:#545454">
                    </lord-icon>
                </a>
            </div>
        `;
    }
}

window.customElements.define("menu-main", menumain);