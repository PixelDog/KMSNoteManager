function LibKMS() {

    let _this = this;

    /**
     * Insert a node before another node
     *
     * @param node newNode the new node
     * @param node the target node to insert after
     *
     */
    _this.insertBefore = (newNode, referenceNode) => {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    };

    /*
    _this.addButtonClick = (buttonId, buttonFunction) => {
      document.getElementById(buttonId).onclick = buttonFunction;
    }
    */

}



/**
 * Document ready handler
 */
const iLibKMS = new LibKMS;
document.addEventListener('DOMContentLoaded', (event) => {
  // do stuff
  console.log("I am ready!!!!");
});
