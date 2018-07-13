import React from "react";
import { Modal, Table } from "react-bootstrap";
import { DangerButton } from "./Button";
import { MediaTabs } from "./Tab";

export class UploadModal extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
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
    const { store, store : { dispatch } } = this.props;
    return (
      <Modal
        show={store.modalShow}
        onHide={() => dispatch({ type: 'HIDE_MODAL' })}
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
          />
        </Modal.Body>
        <Modal.Footer>
          <DangerButton onClick={() => dispatch({ type: 'HIDE_MODAL' })}>
            Done
          </DangerButton>
        </Modal.Footer>
      </Modal>
    );
  }
}

export class RSVPModal extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      modalShow: true,
      rsvp: rsvp
    };
    this.closeModal = this.closeModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }

  closeModal() {
    this.setState({
      modalShow: false
    });
  }

  showModal() {
    this.setState({
      modalShow: true
    });
  }
  render() {
    return (
      <div>
        <Modal
          show={this.state.modalShow}
          onHide={this.closeModal}
          container={this}
        >
          <Modal.Header closeButton />

          <Modal.Body>
            <h2>Thank You! Here are the confirmation details</h2>
            <div className="row-center">
              <div className="col-xs-12 col-center">
                <Table>
                  <tbody>
                    <tr>
                      <td> RSVP No </td>
                      <td>
                        {" "}
                        : #{this.state.rsvp.id.toString().padStart(4, "0")}{" "}
                      </td>
                    </tr>
                    <tr>
                      <td> Attendee </td>
                      <td> : {this.state.rsvp.name} </td>
                    </tr>
                    {this.state.rsvp.table_name ? (
                      <tr>
                        <td> Name of Table </td>
                        <td> : {this.state.rsvp.table_name} </td>
                      </tr>
                    ) : (
                      ""
                    )}
                    <tr>
                      <td> Table for </td>
                      <td> : {this.state.rsvp.total_invitation} </td>
                    </tr>
                    <tr>
                      <td> Email </td>
                      <td> : {this.state.rsvp.email} </td>
                    </tr>

                    {this.state.rsvp.phone ? (
                      <tr>
                        <td> Phone </td>
                        <td> : {this.state.rsvp.phone} </td>
                      </tr>
                    ) : (
                      ""
                    )}
                  </tbody>
                </Table>
              </div>
            </div>
            <button
              className="btn btn-theme dismiss-modal"
              onClick={this.closeModal}
            >
              Ok
            </button>
          </Modal.Body>
        </Modal>
      </div>
    );
  }
}
