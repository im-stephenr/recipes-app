import "./bootstrap";

import * as bootstrap from "bootstrap";

document
    .getElementById("add_ingredient")
    .addEventListener("click", function () {
        let node = document.getElementsByClassName("ingredient")[0];
        let clone = node.cloneNode(true);
        let button = document.createElement("button");

        clone.value = "";
        clone.name = "ingredient[]";

        button.textContent = "x";
        button.classList.add(
            "remove-button",
            "btn",
            "btn-danger",
            "btn-xs",
            "m-1"
        );
        button.setAttribute("type", "button");

        button.addEventListener("click", function () {
            clone.remove();
            button.remove();
        });

        clone.insertAdjacentElement("afterend", button);
        node.parentNode.appendChild(clone);
        node.parentNode.appendChild(button);
    });
