import { Container } from 'react-bootstrap';
import MapSection from './MapSection';
import ContactForm from './ContactForm';
import PageHeader from '../PageHeader';
import { useLocation } from 'react-router';
import { useEffect, useState } from 'react';
import SocmedsSection from './SocmedsSection';
import OfficialCardSection from '../OfficialCardSection';
import { scrollById, setPageMeta } from '../../utils';
import { endpoint } from '../../configs';
import LoadingIndicator from '../LoadingIndicator';

export default function ContactUsPage() {
  setPageMeta(
    'Contact Us - CIMSA ULM',
    "Contact us through our contact form or social media. We'll be happy to hear from you."
  );

  const location = useLocation();
  const [pageData, setPageData] = useState(null);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/contact-us`);

        setPageData(await res.json());
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  useEffect(() => scrollById(location.hash), [location]);

  if (!pageData) {
    return <LoadingIndicator />;
  }

  return (
    <>
      <Container style={{ paddingTop: '100px' }}>
        <PageHeader
          title={pageData.name}
          description={pageData.contents[0].text_content}
        />
        <br />
        <ContactForm />
        <br />
        <hr />
        <br />
      </Container>
      <MapSection />
      <br />
      <br />
      <SocmedsSection />
      <br />
      <br />
      <OfficialCardSection
        period={pageData.contact.generation}
        position={pageData.contact.occupation}
        picture={pageData.contact.image}
        // picture={'https://avatars.githubusercontent.com/u/74972129?v=4'}
        // picture={
        //   'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
        // }
        // picture={
        //   'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2024/07/LOME_Daniella-Enjelika-Sinaga-e1721380348578-300x300.png'
        // }
        name={pageData.contact.name}
        email={pageData.contact.email}
        phone={pageData.contact.phone}
      />
    </>
  );
}
