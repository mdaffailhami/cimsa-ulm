import { Container, Row, Col, Form, Button } from 'react-bootstrap';
import Navbar from '../Navbar';
import Footer from '../Footer';
import LocationSection from './LocationSection';
import ContactForm from './ContactForm';
import PageHeader from '../PageHeader';
import { useLocation } from 'react-router';
import { useEffect } from 'react';
import SocmedsSection from './SocmedsSection';

export default function ContactUsPage() {
  const location = useLocation();

  useEffect(() => {
    // Detect hash in URL, if there is a hash then scroll to that section
    if (location.hash) {
      const element = document.querySelector(location.hash);

      if (element) {
        window.scrollTo(0, element.offsetTop - 80);
      }
    }
  }, [location]);

  return (
    <>
      <Container style={{ paddingTop: '100px' }}>
        <PageHeader
          title='Contact Us'
          description='Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at sint
        fugit repudiandae consequuntur? Quidem eligendi aspernatur nisi debitis
        autem? Praesentium, dolorem voluptatibus cupiditate esse ratione
        repudiandae aut doloremque delectus.'
        />
        <br />
        <ContactForm />
        <br />
        <hr />
        <br />
      </Container>
      <LocationSection />
      <br />
      <br />
      <SocmedsSection />
      <br />
      <br />
    </>
  );
}
