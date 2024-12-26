import { Container, Row, Col, Form, Button } from 'react-bootstrap';
import Navbar from '../Navbar';
import Footer from '../Footer';
import LocationSection from './LocationSection';
import ContactForm from './ContactForm';
import PageHeader from '../PageHeader';

export default function ContactUsPage() {
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
    </>
  );
}
