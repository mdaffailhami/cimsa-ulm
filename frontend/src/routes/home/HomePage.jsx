import AboutUsSection from './AboutUsSection';
import Banner from './Banner';
import NumberOfThingsSection from './NumberOfThingsSection';
import VisionMissionSection from './VisionMissionSection';

export default function HomePage() {
  return (
    <>
      <Banner />
      <br />
      <VisionMissionSection />
      <br />
      <hr />
      <NumberOfThingsSection />
      <hr />
      <br />
      <AboutUsSection />
      <br />
      <hr />
      <br />
      <br />
    </>
  );
}
