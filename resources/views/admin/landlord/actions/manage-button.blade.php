<div class="btn-group">
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('admin.show.landlord', $id) }}">View details</a></li>
      <li><a class="dropdown-item" href="{{ route('admin.edit.landlord', $id) }}">Edit Information</a></li>
      <li><a class="dropdown-item" href="{{ route('admin.change-password.landlord', $id) }}">Change Password</a></li>
      <div class="dropdown-divider"></div>
      <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalDeleteConfirmation">Delete</a></li>
    </ul>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('admin.destroy.landlord', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              <p>Do you want to delete this landlord?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-danger">DELETE</button>
            </div>
        </form>
      </div>
    </div>
  </div>