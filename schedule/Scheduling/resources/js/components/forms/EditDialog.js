import React from 'react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';

export default function AlertDialog(props) {
  const [open, setOpen] = React.useState(false);
  const  {isEditing } = props
  function handleClickOpen() {
    setOpen(true);
  }

  function handleClose() {
    setOpen(false);
  }
  function handleEdit(){
      props.edit()
      setOpen(false)
  }

  return (
    <div>
      <button
                type="button"
                className="btn-block btn btn-primary"
                onClick={handleClickOpen}
                disabled={isEditing}
            >
                {isEditing ? "Editing...":'Edit Timetable'}
            </button>
      <Dialog
        open={open}
        onClose={handleClose}
        aria-labelledby="alert-dialog-title"
        aria-describedby="alert-dialog-description"
      >
        <DialogTitle id="alert-dialog-title" style={{fontSize: 16}}><h4>Edit Schedule</h4></DialogTitle>
        <DialogContent>
          <DialogContentText id="alert-dialog-description" style={{fontSize: 16}}>
            Are you sure you want to edit this schedule?
          </DialogContentText>
        </DialogContent>
        <DialogActions style={{fontSize: 16}}>
          <Button onClick={handleClose} color="primary" style={{fontSize: 12}}>
             Cancel
          </Button>
          <Button onClick={handleEdit} color="primary" autoFocus style={{fontSize: 12}}>
            Edit
          </Button>
        </DialogActions>
      </Dialog>
    </div>
  );
}
