import React from "react";
import {
  Tab,
  Nav,
  NavItem,
  Row,
  Col
} from "react-bootstrap";
import Ajax from "../defaults/ajax";
import { StyledInput } from "./Form";
import { Images } from "./Request";
import AjaxStatus from "./AjaxStatus";
import { withFancyInput } from "../contexts/FancyInputContext";


const ImagesWithContext = withFancyInput(Images);

export class MediaTabs extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      previewUrl: '',
      loading: false,
      status : '',
      message: '',
      showAlert: false,
    };
    this.handleSelect = this.handleSelect.bind(this);
    this.hideAlert = this.hideAlert.bind(this);
    this.uploadFile = this.uploadFile.bind(this);
  }

  handleSelect(key) {
    this.props.onSelect(key);
  }

  hideAlert() {
    this.setState({
      showAlert: false,
    });
  }

  uploadFile(file, previewUrl) {
    const { template } = this.props.store;

    const formData = new FormData();

    formData.append('image', file, file.name);
    formData.append('template', template);

    this.setState({ loading: true, showAlert: false, }, () => {
      Ajax
        .post('/api/upload', formData)
        .then(response => {
          const { message } = response.data;
          this.setState({
            loading: false,
            status: 'success',
            previewUrl,
            message,
          });
        })
        .catch(err => {
          const { message } = err.response.data;
          this.setState({
            loading: false,
            status: 'error',
            message,
          });
        })
        .then(() => {
          this.setState({
            showAlert: true,
          })
        })
      ;
    });
  }

  render() {
    const { previewUrl, ...ajaxState } = this.state;


    const previewImage = previewUrl ? <img src={previewUrl} alt="" className={"img-responsive"}/> : '';

    return (
      <Tab.Container
        id="tabs-with-dropdown"
        activeKey={this.props.tabKey}
        onSelect={this.handleSelect}
      >
        <Row className="clearfix">
          <Col md={12}>
            <Nav bsStyle="tabs" style={{ marginBottom: 20 }}>
              <NavItem eventKey="uploads">Uploads</NavItem>
              <NavItem eventKey="gallery">Gallery</NavItem>
            </Nav>
          </Col>
          <Col md={12}>
            <Tab.Content mountOnEnter>
              <Tab.Pane eventKey="uploads">
                Upload images from your local computer
                <StyledInput
                  label="Open file browser"
                  labelClass="btn btn-success"
                  name="image"
                  onChange={this.uploadFile}
                />
                <AjaxStatus
                  {...ajaxState}
                  onDismiss={this.hideAlert}
                />
                {/*{previewImage}*/}

              </Tab.Pane>
              <Tab.Pane eventKey="gallery">
                Or, use your gallery instead!
                <ImagesWithContext source="/api/images"/>
              </Tab.Pane>
            </Tab.Content>
          </Col>
        </Row>
      </Tab.Container>
    );
  }
}

