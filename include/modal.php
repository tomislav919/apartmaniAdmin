<!-- Modal -->
<div id="calendarModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <div class='col-12 modal-title text-center'><h3>Reservation</h3></div>
      </div>

      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Reservation name:</label>
            <textarea class="form-control" id="modalTitle"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Notes:</label>
            <textarea class="form-control" id="modalBody">No notes</textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="deleteButton" type="button" class="btn btn-danger mr-auto">Delete Reservation</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="saveButton" type="button" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>
