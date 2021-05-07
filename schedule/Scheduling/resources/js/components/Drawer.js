import React from "react";
import ReactDOM from "react-dom";
import { makeStyles } from "@material-ui/core/styles";
import Drawer from "@material-ui/core/Drawer";
import Button from "@material-ui/core/Button";
// import List from "@material-ui/core/List";
// import Divider from "@material-ui/core/Divider";
// import ListItem from "@material-ui/core/ListItem";
// import ListItemIcon from "@material-ui/core/ListItemIcon";
// import ListItemText from "@material-ui/core/ListItemText";
// import InboxIcon from "@material-ui/icons/MoveToInbox";
// import MailIcon from "@material-ui/icons/Mail";
import Form from "./forms/RequestForm";

import { ThemeProvider } from "@material-ui/styles";
const useStyles = makeStyles({
    font: {
        fontSize: 14
    },
    list: {
        width: 500
    },
    fullList: {
        width: "auto"
    }
});

function TemporaryDrawer() {
    const classes = useStyles();
    const [state, setState] = React.useState({
        right: false
    });

    const toggleDrawer = (side, open) => event => {
        if (
            event.type === "keydown" &&
            (event.key === "Tab" || event.key === "Shift")
        ) {
            return;
        }

        setState({ ...state, [side]: open });
    };

    const sideList = side => (
        <div
            className={classes.list}
            role="presentation"
            //   onClick={toggleDrawer(side, false)}
            //   onKeyDown={toggleDrawer(side, false)}
        >
            <Form />
        </div>
    );

    return (
        <div>
            <ThemeProvider>
                <Button
                    onClick={toggleDrawer("right", true)}
                    className={classes.font}
                >
                    Change Venue
                </Button>
                <Drawer
                    anchor="right"
                    open={state.right}
                    onClose={toggleDrawer("right", false)}
                >
                    {sideList("right")}
                </Drawer>
            </ThemeProvider>
        </div>
    );
}
if (document.getElementById("root")) {
    ReactDOM.render(<TemporaryDrawer />, document.getElementById("root"));
}
