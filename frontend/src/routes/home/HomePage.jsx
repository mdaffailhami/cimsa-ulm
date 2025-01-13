import AboutUsSection from './AboutUsSection';
import Banner from './Banner';
import BlogSection from '../BlogSection';
import NumberOfThingsSection from './NumberOfThingsSection';
import QuoteSection from './QuoteSection';
import VisionMissionSection from './VisionMissionSection';
import { setPageMeta } from '../../utils';

export default function HomePage() {
  setPageMeta(
    'CIMSA ULM',
    "Center for Indonesian Medical Students' Activities - Universitas Lambung Mangkurat"
  );

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
      <BlogSection totalPosts={6} />
      <br />
      <hr />
      <br />
      <QuoteSection />
    </>
  );
}
