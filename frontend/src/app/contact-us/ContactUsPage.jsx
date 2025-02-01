import { Container } from 'react-bootstrap';
import MapSection from './MapSection';
import ContactForm from './ContactForm';
import PageHeader from '../../components/PageHeader';
import { useLocation } from 'react-router';
import { useEffect, useState } from 'react';
import SocmedsSection from '../../components/SocmedsSection';
import ContactCardSection from '../../components/ContactCardSection';
import { fetchJSON, scrollById, setPageMeta } from '../../utils';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';

export default function ContactUsPage() {
  setPageMeta(
    'Contact Us - CIMSA ULM',
    "Contact us through our contact form or social media. We'll be happy to hear from you."
  );

  const location = useLocation();
  useEffect(() => scrollById(location.hash), [location]);

  const page = useSWR(`${endpoint}/api/page/contact-us`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <Container>
        <PageHeader
          title='Contact Us'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column === 'description')
                  .text_content
              }
            />
          }
        />
        <br />
        <ContactForm
          web3formsKey={
            page.data.contents.find((x) => x.column === 'web3forms-key')
              .text_content
          }
        />
        <br />
        <hr />
        <br />
      </Container>
      <MapSection
        mapUrl={
          page.data.contents.find((x) => x.column === 'map-url').text_content
        }
      />
      <br />
      <br />
      <SocmedsSection />
      <br />
      <br />
      <ContactCardSection
        period={page.data.contact.generation}
        position={page.data.contact.occupation}
        picture={page.data.contact.image}
        // picture={'https://avatars.githubusercontent.com/u/74972129?v=4'}
        // picture={
        //   'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
        // }
        // picture={
        //   'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2024/07/LOME_Daniella-Enjelika-Sinaga-e1721380348578-300x300.png'
        // }
        name={page.data.contact.name}
        email={page.data.contact.email}
        phone={page.data.contact.phone}
      />
    </>
  );
}
