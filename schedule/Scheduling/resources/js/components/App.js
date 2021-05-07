import React, { Component } from "react";
import ReactDOM from "react-dom";
import Container from "./common/Container";
import { transitions, positions, Provider as AlertProvider } from "react-alert";
import AlertTemplate from "react-alert-template-basic";

// optional cofiguration
const options = {
    // you can also just use 'bottom center'
    position: positions.TOP_CENTER,
    timeout: 5000,
    offset: "30px",
    containerStyle: {
        zIndex: 1000
    },
    // you can also just use 'scale'
    transition: transitions.SCALE
};
export default class App extends Component {
    render() {
        return (
            <div>
                <AlertProvider template={AlertTemplate} {...options}>
                    <Container />
                </AlertProvider>
            </div>
        );
    }
}

if (document.getElementById("example")) {
    ReactDOM.render(<App />, document.getElementById("example"));
}
