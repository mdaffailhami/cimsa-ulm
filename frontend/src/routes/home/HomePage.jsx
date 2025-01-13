import AboutUsSection from './AboutUsSection';
import Banner from './Banner';
import BlogSection from '../BlogSection';
import NumberOfThingsSection from './NumberOfThingsSection';
import QuoteSection from './QuoteSection';
import VisionMissionSection from './VisionMissionSection';
import { useEffect } from 'react';

export default function HomePage({ profile }) {
  document.title = 'CIMSA ULM';

  return (
    <>
      <Banner profile={profile} />
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
