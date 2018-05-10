import React from "react";
import { Modal, Tabs, Tab } from "react-bootstrap";
import { DangerButton } from "./Button";
import { MediaTabs } from "./Tab";

export class UploadModal extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {},
      tabKey: "uploads"
    };
    this.changeTab = this.changeTab.bind(this);
  }

  changeTab(newKey) {
    this.setState({
      tabKey: newKey
    });
  }
  render() {
    return (
      <Modal
        {...this.props}
        bsSize="large"
        aria-labelledby="contained-modal-title-lg"
      >
        <Modal.Header closeButton>
          <Modal.Title id="contained-modal-title-lg"> Media </Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <MediaTabs
            tabKey={this.state.tabKey}
            onSelect={this.changeTab}
            file={this.state.file}
            i={this.props.i}
          />
        </Modal.Body>
        <Modal.Footer>
          <DangerButton text="Done" onClick={this.props.onHide} />
        </Modal.Footer>
      </Modal>
    );
  }
}
