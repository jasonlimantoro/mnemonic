import React from "react";
import Slider from "react-slick";
import { Modal, Tabs, Tab, Table } from "react-bootstrap";
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

export class GalleryModal extends React.Component {
  constructor(props) {
    super(props);
    this.handleHide = this.handleHide.bind(this);
  }

  handleHide() {
    this.props.hide();
  }

  render() {
    var settings = {
      useTransform: false,
      infinite: true,
			speed: 500,
			dots: true,
      slidesToShow: 1,
			slidesToScroll: 1,
			initialSlide: this.props.index,
    };
    let countItems = this.props.items.length;
    let items = this.props.items.map((item, index) => {
      return (
        <div key={item.id}>
          <img
            src={item.attributes.url_cache}
            alt={"image-" + item.id}
            className="img-responsive"
          />
          <span style={{ float: "right" }}>
            {index + 1} / {countItems}
          </span>
        </div>
      );
    });
    return (
      <div>
        <Modal
          show={this.props.show}
          onHide={this.handleHide}
          bsSize="large"
					className="gallery-modal"
        >
          <Modal.Header closeButton> 
						<Modal.Title className="font-theme modal-album-title" componentClass="h1">
							Album: {this.props.heading}
						</Modal.Title>
					</Modal.Header>
          <Modal.Body>
            <Slider {...settings}>{items}</Slider>
          </Modal.Body>
        </Modal>
      </div>
    );
  }
}
