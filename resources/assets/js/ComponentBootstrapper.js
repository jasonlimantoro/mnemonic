import ReactHabitat from "react-habitat";
import {RSVPModal} from "./components/Modal";
import {RSVPTimer} from "./components/RSVPTimer";
import {AlbumSlider, BridesBestSlider} from "./components/Slider";

const components = {
  RSVPModal,
  RSVPTimer,
  AlbumSlider,
  BridesBestSlider
};

class AppBootstraper extends ReactHabitat.Bootstrapper {
  constructor(){
    super();
    // Create a new container builder:
    this.builder = new ReactHabitat.ContainerBuilder();

    // Registering Components
    for (const key in components){
      this.registerComponent(components[key], key);
    }

    // Finally, set the container
    this.setContainer(this.builder.build());
  }

  registerComponent(Component, alias){
    this.builder.register(Component).as(alias);
  }

}

export default new AppBootstraper();
