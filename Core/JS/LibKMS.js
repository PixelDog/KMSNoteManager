function LibKMS() {

  let _this = this;

  /**
  * Ajax for new note
  *
  * @param string nodeId the node id for the form
  *
  */
  _this.newNote = (nodeId) => {
    $(nodeId).on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: './Core/Services/Notes/NewNote.php',
        data: $(nodeId).serialize(),
        success: function () {
          location.reload();
        }
      });
    });
  };
}



/**
* Document ready handler
*/
const iLibKMS = new LibKMS();
document.addEventListener('DOMContentLoaded', (event) => {
  iLibKMS.newNote("#NewNote");
});
